<?php
/*
*     Author: Ravinder Mann
*     Email: ravi@codiator.com
*     Web: http://www.codiator.com
*     Release: 1.4
*
* Please direct bug reports,suggestions or feedback to :
* http://www.codiator.com/contact/
*
* Car Trading Made Easy is a commercial software. Any distribution is strictly prohibited.
*
*/
function setOptionValues($host,$database,$username,$password,$adminOptionTable){
	if(!isset($_SESSION["autoadmin_settings"])) setReSession($host,$database,$username,$password,$adminOptionTable);
	return $_SESSION["autoadmin_settings"];
}

function setReSession($host,$database,$username,$password,$adminOptionTable){
	$con=mysql_connect($host,$username,$password) or die("Could not connect. Please try again.");
	mysql_select_db($database,$con);
	mysql_query("SET NAMES utf8");
	$adminQr="select * from $adminOptionTable";
	$adminResult=mysql_query($adminQr);
	$adminOptions=mysql_fetch_assoc($adminResult);
	$_SESSION["autoadmin_settings"]=$adminOptions;
	
	if(trim($adminOptions['siteoutercolor'])!="" || trim($adminOptions['siteheadercolor'])!="" || trim($adminOptions['siteheaderfontcolor'])!="" || trim($adminOptions['siteinnercolor'])!="" || trim($adminOptions['sitebordercolor'])!="" || trim($adminOptions['searchformcolor'])!="" || trim($adminOptions['searchformbordercolor'])!="" || trim($adminOptions['searchformfontcolor'])!="" || trim($adminOptions['menuboxcolor'])!="" || trim($adminOptions['menuboxfontcolor'])!="" || trim($adminOptions['menuboxbordercolor'])!=""){
		$_SESSION["recustom_settings"]=1;
		
	}
   
}

function setLanguageValues($host,$database,$username,$password,$languageTable,$redefaultLanguage){
    if(!isset($_SESSION["auto_language"])) setLanguageSession($host,$database,$username,$password,$languageTable,$redefaultLanguage);
    return  $_SESSION["auto_language"];
}

function setLanguageSession($host,$database,$username,$password,$languageTable,$redefaultLanguage){
	$con=mysql_connect($host,$username,$password) or die("Could not connect. Please try again.");
	mysql_select_db($database,$con);
	mysql_query("SET NAMES utf8");
	$adminQr="select * from $languageTable where language='$redefaultLanguage'";
	$adminResult=mysql_query($adminQr);
	while($langOptions=mysql_fetch_assoc($adminResult)){
		$languageTags[$langOptions['keyword']]=stripslashes($langOptions['translation']);
	}

	$_SESSION["auto_language"]=$languageTags;
		 
}

?>