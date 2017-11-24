<?php if(($ptype=="showOnMap" && $_GET['fullscreen']=="true") || ($fullScreenEnabled=="true" && ($ptype!="submitReListing" && $ptype!="editReListingForm" && $ptype!="viewFullListing"))){
    if($ptype=="showOnMap"){
    $reCategoryArray=$_POST['category'];
    $reSubcategoriesArray=$_POST['subcategories'];
    $reautoAge=$_POST['autoage'];
    $rebodyType=$_POST['bodytype'];
    $refuelType=$_POST['fueltype'];
    $retransmissionType=$_POST['transmission'];
    $relistingBy=$_POST['listingby'];
    $rePriceArray=$_POST['price'];
    $reQuery=mysql_real_escape_string($_POST['requery']);
    $reCity=mysql_real_escape_string(trim($_POST['city']));

    $reCategory=getCommaStringFromArray($reCategoryArray);
    $reSubcategory=getCommaStringFromArray($reSubcategoriesArray);
    $rePrice=getCommaStringFromArray($rePriceArray);
    $autoAge=getCommaStringFromArray($reautoAge);
    $bodyType=getCommaStringFromArray($rebodyType);
    $fuelType=getCommaStringFromArray($refuelType);
    $transmissionType=getCommaStringFromArray($retransmissionType);
    $listingBy=getCommaStringFromArray($relistingBy);
    
    reSetSearchSession($reCategory,$reSubcategory,$rePrice,$autoAge,$bodyType,$fuelType,$transmissionType,$listingBy,$reQuery,$reCity);

    }
    
    include("js/fs.php");  
    include("js/v3map.js");
    
}
 
if($ptype=="submitReListing" || $ptype=="editReListingForm" ){  
    if($ptype=="editReListingForm"){
        $con=mysql_connect($host,$username,$password) or die("Could not connect. Please try again.");
        mysql_select_db($database,$con);
        mysql_query("SET NAMES utf8");
        $reid=mysql_real_escape_string($_GET['reid']);
        
        if($_SESSION["memtype"]==9) $qr1="select * from $reListingTable where id='$reid' ";
        else  $qr1="select * from $reListingTable where id='$reid' and user_id='$mem_id'";
        $result1=mysql_query($qr1);
        $fullRelisting=mysql_fetch_assoc($result1);
        include("addEditListingMap.js");
        
    }else{
     include("addEditListingMap.js");
    } 
?>

<?php } ?>
var a=10;
$("#customLocation").click(function(){var currCenter=map.getCenter();if($('#customLocation').is(':checked')){$("#addListingMap").css('display','block');$("#listinglatLong").css('display','block')}else{$("#addListingMap").css('display','none');$("#listinglatLong").css('display','none')}$("#addListingMap").trigger("resize");google.maps.event.trigger(map,'resize');map.setCenter(currCenter)});

<?php if($ptype=="viewFullListing"){ include("listingMap.js"); } ?>
