var mobject={};
    mobject.map=null;
    mobject.markers=[];
    mobject.markerids=[];
    mobject.markerClusterer=null;
    mobject.markerPop=null;
    mobject.geocoder=null;
    mobject.currentBounds=null;
    var remap=$('#mapResults');
    mobject.center=null;
  <?php if($mbtnClicked){ ?>
  	mobject.clicked=true;
  <?php }else{ ?>	
    mobject.clicked=false;
  <?php } ?>      
   mobject.favclicked=false;
        
    function _(label,message){ window.console && console.log(label+": "+message);}
    function calculateCenter(){ mobject.center = mobject.map.getCenter(); }
    
    mobject.init= function(){
        var latlng = null;
             
        options = {
          'zoom': 11,
          'center': mobject.center,
          'mapTypeId': google.maps.MapTypeId.ROADMAP,
          scrollwheel: false,
          panControl: true,
            mapTypeControl: true,
            panControlOptions: {
        <?php if($_SESSION["rtl"]){ ?> position: google.maps.ControlPosition.LEFT_TOP <?php }else{ ?>
        	position: google.maps.ControlPosition.RIGHT_TOP
        <?php } ?>	
            },
          zoomControl: true,
          zoomControlOptions: {
            style: google.maps.ZoomControlStyle.LARGE,
       <?php if($_SESSION["rtl"]){ ?> position: google.maps.ControlPosition.LEFT_TOP <?php }else{ ?>
       		position: google.maps.ControlPosition.RIGHT_TOP
        <?php } ?>
            }
        };
        
        mobject.map = new google.maps.Map(document.getElementById('mapResults'), options);
      
        google.maps.event.addListener(mobject.map,'idle',function (event) { calculateCenter(); });
        google.maps.event.addListener(mobject.map, 'zoom_changed', function() { loadTextData(0); $( "#sidebarTabs" ).tabs("select", "#sidebarResults"); });
        google.maps.event.addListener(mobject.map, 'dragend', function() { loadTextData(0); $( "#sidebarTabs" ).tabs("select", "#sidebarResults"); });
        
        mobject.markerPop = new google.maps.InfoWindow();
        loadMapData();
                 
    };
    
   $(window).resize(function () { loadMapData(); }); 
   mobject.geocoder = new google.maps.Geocoder();
        
    google.maps.event.addDomListener(window, 'load', mobject.init);
    google.maps.event.addDomListener(window, 'resize', function(){ 
    	if(mobject.center!=null)mobject.map.setCenter(mobject.center); _("resize","yes"); });
    
    
    function getCoordinates(address){
    	
     mobject.geocoder.geocode( {'address' : address}, function(results, status) {
             if (status == google.maps.GeocoderStatus.OK) {
             mobject.center = results[0].geometry.location; 
             return mobject.center;
             }else{ return null;  }
           });    
                      
     }
      
   $("#sidebarResults").on("click",".textrecord",function(){
   	$("#theListing").hide("slow");
   	var clickedLatLong=$(".textlatlong",this).html();  	
   /*	console.log(mobject.markerids);
   	console.log('val:'+mobject.markerids[clickedLatLong]); */
   	google.maps.event.trigger(mobject.markers[mobject.markerids[clickedLatLong]], 'click');
   });
        
    mobject.loadMarkers = function(data){ 
    
    mobject.clear();
    var tempArray={};
    var latLngStr;
    var mCounter=0;
    var featured_marker = {url: 'images/markers/featured.png', size: new google.maps.Size(32, 37), origin: new google.maps.Point(0,0),anchor: new google.maps.Point(0, 37)};
    var shadow_marker = {url: 'images/markers/shadow.png', size: new google.maps.Size(51, 37), origin: new google.maps.Point(0,0),anchor: new google.maps.Point(0, 37)};
	
    if(data!=null && $.trim(data)!=""){ 
    $('.nolisting').hide();	
    $.each(data, function(index, d){ 
       var latLng = new google.maps.LatLng(d.la,d.lo); 
       
       if(d.lt==2) var marker = new google.maps.Marker({'position': latLng,'icon': featured_marker,'shadow':shadow_marker});  
       else{
       	if(d.ca!="" && typeof d.ca !== "undefined"){
       	var m_image="images/markers/"+d.ca+".png";
       	var a_marker = {
            url: m_image,
        	size: new google.maps.Size(32, 37),
        	origin: new google.maps.Point(0, 0),
        	anchor: new google.maps.Point(0, 37)
        	};
        var marker = new google.maps.Marker({
                    'position': latLng,
                    'icon': a_marker,
                    'shadow': shadow_marker
                });		
       	}else{
       	var marker = new google.maps.Marker({'position': latLng});
       	}
       	 } 
       latLngStr=latLng.toUrlValue(); 
       if(tempArray[latLngStr]==null){
       if(d.id==null) d.id=0;
       mobject.markers.push(marker); 
       mobject.markerids[d.la+","+d.lo]=mCounter;
       mCounter++;
       var fn = mobject.markerClickHandler(d.id, latLng);
       google.maps.event.addListener(marker, 'click', fn);
       mobject.bounds.extend(latLng);
       tempArray[latLngStr]=1;
       }        
   });
   mobject.map.setCenter(mobject.bounds.getCenter());
        
   mobject.markerClusterer = new MarkerClusterer(mobject.map, mobject.markers);
  
  <?php if($geoipenable!="yes"){ ?> 
   mobject.map.fitBounds(mobject.bounds);     
   var zoomLevel = mobject.map.getZoom(); _("zoom",zoomLevel);
   if(zoomLevel >=4 && mobject.clicked==true){ zoomLevel=zoomLevel-1; mobject.map.setZoom(zoomLevel); }
   if(zoomLevel >=19){
   zoomLevel=zoomLevel=18;  
   mobject.map.setZoom(zoomLevel);
   }
  <?php }else{ ?> 
   var reCity=$.trim($('input#reCity').val());
   var reQuery=$.trim($('input#reQuery').val());
         
   if($.trim(reCity)=="" && $.trim(reQuery)=="" && mobject.clicked==false){
   var gLat=geoplugin_latitude();
   var gLong=geoplugin_longitude(); 
   var geoLatLng = new google.maps.LatLng(gLat, gLong); 
   mobject.map.setCenter(geoLatLng);
   <?php if($defaultCityZoom>0){ ?>
   mobject.map.setZoom(<?php print $defaultCityZoom; ?>); 
   <?php }else{ ?>
   mobject.map.setZoom(11);
   <?php } ?>
   }else{
   mobject.map.fitBounds(mobject.bounds);     
   var zoomLevel = mobject.map.getZoom(); 
   if(zoomLevel >=4 && mobject.clicked==true){ zoomLevel=zoomLevel-1; mobject.map.setZoom(zoomLevel); }
   if(zoomLevel >=19){
   zoomLevel=zoomLevel=18;  
   mobject.map.setZoom(zoomLevel);
   }
   }
 <?php } ?>
     
   }else{
           mobject.clear();
           var reCity=$.trim($('input#reCity').val());
           if($.trim(reCity)!=""){
           mobject.geocoder.geocode( {'address' : reCity}, function(results, status) {
             if (status == google.maps.GeocoderStatus.OK) {
             mobject.map.setCenter(results[0].geometry.location);
             <?php if($defaultCityZoom>0){ ?>
  				mobject.map.setZoom(<?php print $defaultCityZoom; ?>); 
   			<?php }else{ ?>
   				mobject.map.setZoom(11);
   			<?php } ?>
             }
          }); 
           }else{
           	 <?php if($geoipenable!="yes"){ ?>
           	<?php if($defaultcountry_latlng!=""){ 
           	list($clat,$clong)=explode("::",$defaultcountry_latlng);	
            ?>
             var cgeoLatLng = new google.maps.LatLng("<?php print $clat; ?>", "<?php print $clong; ?>");
   			 mobject.map.setCenter(cgeoLatLng);
             <?php if($defaultCountryZoom>0){ ?>
   				mobject.map.setZoom(<?php print $defaultCountryZoom; ?>); 
   			<?php }else{ ?>
   				mobject.map.setZoom(4);
   			<?php } 
   			}else{ ?>
   			var cgeoLatLng=	new google.maps.LatLng("39.36827914916013","-101.865234375");
   			mobject.map.setCenter(cgeoLatLng);
   			mobject.map.setZoom(<?php print $defaultCountryZoom; ?>); 	
   		    <?php } ?>
   		    <?php }else{ ?>
   		    var gLat=geoplugin_latitude();
  			var gLong=geoplugin_longitude();
   			var geoLatLng = new google.maps.LatLng(gLat, gLong);
   			mobject.map.setCenter(geoLatLng);
   			<?php if($defaultCityZoom>0){ ?>
   			mobject.map.setZoom(<?php print $defaultCityZoom; ?>); 
   			<?php }else{ ?>
   			mobject.map.setZoom(11);
   			<?php } } ?>
           }
           $('.nolisting').show('slow');
       }
   
  };

    mobject.markerClickHandler = function(id,latLng){
      return function(e) {
      if(typeof e!='undefined'){
       e.cancelBubble = true;
       e.returnValue = false;
       if (e.stopPropagation) {
        e.stopPropagation();
        e.preventDefault();
        } 
       }
       
     <?php
     $markerPopStyle="min-height:230px; min-width:700px;";
     if(isset($_SESSION["winwidth"]) && ($_SESSION["winwidth"]<=1024 && $_SESSION["winwidth"]>=500)){ $markerPopStyle="min-height:120px; min-width:350px;"; }
     if(isset($_SESSION["winwidth"]) && $_SESSION["winwidth"]<500){ $markerPopStyle="min-height:60px; min-width:150px;"; }
     ?>
       var infoHtml = '<div class="info" style="text-align:center; <?php print $markerPopStyle; ?>"><?php print __("Please wait, loading"); ?> ....<br /><br /><img src="images/loading2.gif" /></div>'; 

       mobject.markerPop.setContent(infoHtml);
       mobject.markerPop.setPosition(latLng);
       mobject.markerPop.open(mobject.map);
       
      <?php if($autoadmin_settings['markerjsonurl']!=""){ ?>
      var url="<?php print trim($autoadmin_settings['markerjsonurl']).'?callback=?'; ?>"; 
      <?php }else{ ?>	
      var url="ajax.php"; 
      <?php } ?>
     
       $.ajax({
          type: 'GET',    
          url: url,
          data:{id:0, latlng:latLng.toUrlValue()},
          <?php if($autoadmin_settings['markerjsonurl']!=""){ ?>
          dataType: "jsonp",
          crossDomain: true,     
          <?php } ?>	     
          cache:false, 
          success: function(data){ 
          	<?php if($autoadmin_settings['markerjsonurl']==""){ ?> data=$.parseJSON(data); <?php } ?>
          	mobject.markerPop.setContent(data); 
          	$("a[rel^='prettyPhoto']").prettyPhoto();
          	},
          error:function(jqXHR, textStatus, errorThrown){ /*alert(errorThrown);*/ }
        });
        
      };
    };
    
    mobject.getBounds=function(){
    var bounds = mobject.map.getBounds();
    var ne = bounds.getNorthEast();
    var sw = bounds.getSouthWest();   
    };
   
   mobject.clear = function() {
        for (var i = 0, marker; marker = mobject.markers[i]; i++) {
          marker.setMap(null);
        }
        mobject.markers=[];
        if (mobject.markerClusterer) mobject.markerClusterer.clearMarkers();
        mobject.bounds=null;
        mobject.bounds = new google.maps.LatLngBounds ();
        
   };
   $('.nav .first_item').addClass("active");
   $('#reSearchMap2').click(function() {
   	  mobject.clicked=true;
   	  mobject.favclicked=false;
   	  mobject.markerPop.close();
   	  $("#theListing").hide("slow");
   	  $('.nav .favli').removeClass("active");
   	  $('.nav .first_item').addClass("active");
      loadMapData();    
      $( "#sidebarTabs" ).tabs("select", "#sidebarResults"); 
      <?php if(isset($_GET['hidesidebar'])){ ?>
    	toggleSlidebar();
      <?php } ?> 
      if($(window).width()<=768){ toggleSlidebar(); }
    });
   
   $('.nav .favli').click(function(event){
	    event.preventDefault(); 
		$('.nav li').removeClass("active");
		$(this).addClass("active");
		mobject.favclicked=true;
		loadMapData();
	});
	
	$("#sidebarTabs").on("click","#textResultsTable li:not(.disabled) a", function(){
   		var clickedLinkid=this.id;
    	var allData=clickedLinkid.split("-");
    	loadTextData(allData[1]);
    });
    
    var successMapTextData=function(data){ 
	 $("#MapLoadingImage").hide();	
     $("#sidebarResults").html(data);
	/* condole.log("alldata: "+data); */
	};

   function loadTextData(pagenum){
 	   $("#MapLoadingImage").show();  	
   	   $("#sidebarResults").html("<p align='center'>Loading ....</p>");
   	     	   
   	   mobject.currentBounds=mobject.map.getBounds();
		
       var neCoordinates=mobject.currentBounds.getNorthEast();
	   var swCoordinates=mobject.currentBounds.getSouthWest();
	   var neLat=neCoordinates.lat();
	   var neLong=neCoordinates.lng();
	   var swLat=swCoordinates.lat();
	   var swLong=swCoordinates.lng();
	   
	   if(neCoordinates.lng() < 0 && (swCoordinates.lng() > neCoordinates.lng())){ neLong=180; swLong=-180; }
	   if(neCoordinates.lng() > 0 && (swCoordinates.lng() > neCoordinates.lng())){ neLong=180; swLong=-180; }
	   
	  var reCategory=$.trim($('select#reCategory').val());
      var subCategories=$.trim($('select#subCategories').val());
      var reautoAge=$.trim($('select#autoAge').val());
      var rebodyType=$.trim($('select#bodyType').val());
      var refuelType=$.trim($('select#fuelType').val());
      var retransmissionType=$.trim($('select#transmissionType').val());
      var relistingBy=$.trim($('select#listingBy').val());
      var rePrice=$.trim($('select#rePrice').val());
      var reQuery=$.trim($('input#reQuery').val());
      var reCity=$.trim($('input#reCity').val());
      
      var favorite=0;
      if(mobject.favclicked==true) favorite=1;
     
     <?php if($autoadmin_settings['jsontexturl']!=""){ ?>
      var url="<?php print trim($autoadmin_settings['jsontexturl']).'?callback=?'; ?>"; 
      <?php }else{ ?>	
      var url="jsonTextData.php"; 
      <?php } ?>
       	   
	   $.ajax({
          type: 'GET',    
          url: url,          
          data:{category:reCategory,subcategories:subCategories,autoage:reautoAge,bodytype:rebodyType,fueltype:refuelType,transmission:retransmissionType,listingby:relistingBy,price:rePrice,requery:reQuery,city:reCity,favorite:favorite,nelatitude:neLat,nelongitude:neLong,swlatitude:swLat,swlongitude:swLong,pagenum:pagenum},
        <?php if($autoadmin_settings['jsonurl']!=""){ 
          if(strpos($_SERVER['HTTP_HOST'],$autoadmin_settings['jsonurl']) === false && strpos($autoadmin_settings['jsonurl'],$_SERVER['HTTP_HOST']) === false ){	
          	?>
          dataType: "jsonp",
          crossDomain: true,     
          <?php } } ?>	     
          cache:false, 
          success: successMapTextData,
          error:function(jqXHR, textStatus, errorThrown){ /* alert(errorThrown); */ }
        });
   }
   
   
   var successMapData=function(data){ 
   	   /* _('data',data); */
       var resultHtml=[]; 
       <?php if(trim($autoadmin_settings['jsonurl'])==""){ ?>
       data = $.parseJSON(data); 
       <?php } ?> 
     
       $('.nolisting').hide();
       mobject.loadMarkers(data);
       
       $("#MapLoadingImage").hide();
       setTimeout(function(){loadTextData(0);}, 1000);
       google.maps.event.trigger(mobject.map, 'resize');
      };
         
   function loadMapData(){
      $("#MapLoadingImage").show(); 
      <?php if($autoadmin_settings['jsonurl']!=""){ ?>
      var url="<?php print trim($autoadmin_settings['jsonurl']).'?callback=?'; ?>"; 
      <?php }else{ ?>	
      var url="jsonData.php"; 
      <?php } ?>
      var reCategory=$.trim($('select#reCategory').val());
      var subCategories=$.trim($('select#subCategories').val());
      var reautoAge=$.trim($('select#autoAge').val());
      var rebodyType=$.trim($('select#bodyType').val());
      var refuelType=$.trim($('select#fuelType').val());
      var retransmissionType=$.trim($('select#transmissionType').val());
      var relistingBy=$.trim($('select#listingBy').val());
      var rePrice=$.trim($('select#rePrice').val());
      var reQuery=$.trim($('input#reQuery').val());
      var reCity=$.trim($('input#reCity').val());
      
      var favorite=0;
      if(mobject.favclicked==true) favorite=1;
       
      $.ajax({
          type: 'GET',    
          url: url,
          data:{category:reCategory,subcategories:subCategories,autoage:reautoAge,bodytype:rebodyType,fueltype:refuelType,transmission:retransmissionType,listingby:relistingBy,price:rePrice,requery:reQuery,city:reCity,favorite:favorite},
      <?php if($autoadmin_settings['jsonurl']!=""){ ?>
          dataType: "jsonp",
          crossDomain: true,     
          <?php } ?>	     
          cache:false, 
          success: successMapData,
          error:function(jqXHR, textStatus, errorThrown){ /* alert(errorThrown); */ }
        });
   }

var sidebarVisible=1;
$('#hidebar, #showbar').click(function(){
toggleSlidebar();
});
<?php print "/* windwidth: ".$_SESSION["winwidth"]."*/"; ?>
<?php if(isset($_GET['hidesidebar'])){ ?>
toggleSlidebar();
<?php } ?> 

if($(window).width()<=768){ toggleSlidebar(); }

function toggleSlidebar(){
if($("#sidebar1:visible").length == 1 || $("#sidebarResults:visible").length == 1) sidebarVisible=0; else sidebarVisible=1;
$('#sidebar').toggle('slide', {direction: '<?php if($rtl) print "right"; else print "left"; ?>'}, 500);
$('#showbar').toggle('slide', {direction: '<?php if($rtl) print "right"; else print "left"; ?>'}, 500);
$(".tooltip").hide();
setWidthHeight();
//google.maps.event.trigger(mobject.map, "resize");	
}
/*
$('#mainContent').on('click', '#theListingLink', function (event){   
event.preventDefault();
});
*/

$('#mainContent').on('click', '#theListingLink', function (event){
		 event.preventDefault();
	     $("#theListing").show("slow");
	     $("#theListing").html("<div style='margin-left:50%; margin-top:25%;'><b><?php print __('Loading'); ?>....</b><br /><br /><img src='images/loading1b.gif' /></div>");
	      var idNum = $("span",this).attr("id");
	      <?php if($autoadmin_settings['listingjsonurl']==""){ ?>
	      $.ajax({ type: 'GET', url: 'infoResults.php', data:{q:idNum, type:25}, success: function(data){ 
	      	$('#theListing').html(data); 
	      	$('#rememberAction').css('background-color',$('body').css('background-color'));
			$('#rememberAction').css('color',$('body').css('color'));
			$('#rememberAction').css('font-family',$('body').css('font-family'));
			$("a[rel^='prettyPhoto']").prettyPhoto();
			$('#viewListingImages').bxSlider({
    			slideWidth: 100,
    			minSlides: 2,
    			maxSlides: 10,
    			slideMargin: 10
  			});
			//$('#rememberAction').css('line-height',$('body').css('line-height'));
	      	}});
	      <?php }else{ ?>
	      var url="<?php print trim($autoadmin_settings['listingjsonurl']).'?callback=?'; ?>"; 		
      	 $.ajax({
          type: 'GET',    
          url: url,
          data:{id:idNum},
          dataType: "jsonp",
          crossDomain: true,     
          cache:false, 
          success: function(data){ $("#theListing").html(data);
          },
          error:function(jqXHR, textStatus, errorThrown){ /* alert(errorThrown); */ }
          });
          
      	  <?php } ?>
      	  
      	  $('#theListing').css('overflow', 'auto');
	 });
