<?php
/*
Title: Pages Index
Author: Brandon Chong
Version: 2.1
*/

include("layouts/nav.php");
// Template Default set include
if($page<>""&&$page<>'index'){
	$pageFileSystem=WEBBY_ROOT.'/pages/'.$page.'/index.php';
	if($adminlogin==""){
		$pageFileSystem=WEBBY_ROOT."/pages/login/index.php";
	}
	if(file_exists($pageFileSystem)){
		include($pageFileSystem);
	}else{
		include(WEBBY_ROOT.'/pages/error/404.php');
	}
}else{
	$pageFileSystem=WEBBY_ROOT.'/pages/home/index.php';
	if($adminlogin==""){
		$pageFileSystem=WEBBY_ROOT."/pages/login/index.php";
	}
	if(file_exists($pageFileSystem)){
		include($pageFileSystem);
	}else{
		include(WEBBY_ROOT.'/pages/error/404.php');
	}
}
?>