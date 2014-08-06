<?php
if(strpos($_SERVER["HTTP_HOST"],"localhost") >= 0 || strpos($_SERVER["HTTP_HOST"],"192.168.1") >= 0)
{
	$tconfig["tsite_folder"] = "/~techiest/php/videoblog/pushnotification";
	$tconfig["tsite_folder1"] = "/home/techiest/public_html/php/videoblog/pushnotification";
}	
else
{
	$tconfig["tsite_folder"]  = "/~techiest/php/videoblog/pushnotification";
	$tconfig["tsite_folder1"] = "/home/techiest/public_html/php/videoblog/pushnotification";
}
//echo $tconfig["tsite_folder"];exit;
$tconfig["tsite_admin"] = "admin";
$tconfig["tsite_url"] = "http://".$_SERVER["HTTP_HOST"].$tconfig["tsite_folder"];


$site_path	= $_SERVER["DOCUMENT_ROOT"].$tconfig["tsite_folder"];
$site_url = $tconfig["tsite_url"];


$tconfig["tpanel_url"] = "http://".$_SERVER["HTTP_HOST"]."/".$tconfig["tsite_folder"]."/".$tconfig["tsite_admin"];

$admin_url = $tconfig["tpanel_url"];
$admin_path=$_SERVER["DOCUMENT_ROOT"].$tconfig["tsite_folder"]."/".$tconfig["tsite_admin"];

define('PUSHURL', $tconfig["tsite_url"].'/pushnotify/');
define('ANDROID_PUSHURL', $tconfig["tsite_url"].'/pushnotify_Android/');

define('APPID', '1');
define('CERTID', '1');


//defined( '_TEXEC' ) or die( 'Restricted access' );
//echo $tconfig["tsite_folder1"];exit;
$parts = explode( DS, TPATH_BASE );
define( 'TPATH_ROOT',			$tconfig["tsite_folder1"] );

define( 'TPATH_ADMINISTRATOR', 	TPATH_ROOT.DS.'admin' );
define( 'TPATH_LIBRARIES', 		TPATH_ROOT.DS.'libraries' );
define( 'TPATH_CLASS_DATABASE', TPATH_ROOT.DS.'libraries'.DS.'database/' );
define( 'TPATH_CLASS_GEN', 		TPATH_ROOT.DS.'libraries'.DS.'general/' );

$imagemagickinstalldir='/usr/local/bin';
$useimagemagick = "Yes";


if(strpos($_SERVER["HTTP_HOST"],"localhost") >= 0 || strpos($_SERVER["HTTP_HOST"],"192.168.1") >= 0)
{

	define( 'TSITE_SERVER','localhost');
	define( 'TSITE_DB','techiest_pushnotification');
	define( 'TSITE_USERNAME','techiest_demo');
	define( 'TSITE_PASS','}+WcVR!bxu8O');
	
	/**
	* Database config variables
	*/
	define("DB_HOST", "localhost");
	define("DB_DATABASE", "techiest_pushnotification");
	define("DB_USER", "techiest_demo");
	define("DB_PASSWORD", "}+WcVR!bxu8O");
	
	/*
	* Google API Key
	*/
	//define("GOOGLE_API_KEY", "AIzaSyDTrUlkLcYCDF6BFq8pEVU_UaNhtro2Onc"); // Place your Google API Key WETIME
	//define("GOOGLE_API_KEY", "AIzaSyArqIUvORyn7hSZ9jpeyH0idYz2oiQvCys"); // EMERGENCYCALL
	//define("GOOGLE_API_KEY", "AIzaSyC37YyMOZ6gGod5aWLy3eMtwAGRfyj2DAQ"); // PUSH TEST
	define("GOOGLE_API_KEY", "AIzaSyDmHt0C623lkSflUrqojkK9BdY0FrrSark"); // PUSH TEST

}
else
{
	define( 'TSITE_SERVER','localhost');
	define( 'TSITE_DB','techiest_pushnotification ');
	define( 'TSITE_USERNAME','techiest_demo');
	define( 'TSITE_PASS','}+WcVR!bxu8O');
	/**
	* Database config variables
	*/
	define("DB_HOST", "localhost");
	define("DB_DATABASE", "techiest_pushnotification");
	define("DB_USER", "techiest_demo");
	define("DB_PASSWORD", "}+WcVR!bxu8O");
	
	/*
	* Google API Key
	*/
	//define("GOOGLE_API_KEY", "AIzaSyDTrUlkLcYCDF6BFq8pEVU_UaNhtro2Onc"); // Place your Google API Key WETIME
	//define("GOOGLE_API_KEY", "AIzaSyArqIUvORyn7hSZ9jpeyH0idYz2oiQvCys"); // EMERGENCYCALL
	//define("GOOGLE_API_KEY", "AIzaSyA_zebhzgXEeiPDz5dRjp2RWBqZMGVug48"); // PUSH TEST [MediaLytix]
	//define("GOOGLE_API_KEY", "AIzaSyC37YyMOZ6gGod5aWLy3eMtwAGRfyj2DAQ");
	define("GOOGLE_API_KEY", "AIzaSyDmHt0C623lkSflUrqojkK9BdY0FrrSark"); // PUSH TEST
}

//Certificate folder
$certificateFolder = 'certificates';


//Push and Feedback servers
//These urls are stored in mySQL in the CertificateTypes table.

//Date settings. Apple uses UTC dates for Feedback info
date_default_timezone_set('UTC');

function p($var){
	echo "<pre>";
	print_r($var);
	echo "<hr>";
}
?>
