<?php
	header("content-type:text/html;charset=UTF-8");

	define("SITE_URL", "http://www.10rain.site/");
	define("CSS_URL", SITE_URL."weixin/wx/Public/Home/css/");	
	define("IMG_URL", SITE_URL."weixin/wx/Public/Home/img/");	
   	define("JS_URL", SITE_URL."weixin/wx/Public/Home/js/");	

	define('APP_PATH','./wx/');
	define("APP_DEBUG", true);
	include "./ThinkPHP/ThinkPHP.php";