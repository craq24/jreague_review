<?php 

session_start();

$referer=$_SERVER['HTTP_REFERER'];
$flg=$_SESSION["flg"];


#ダイレクトアクセス

$url=(empty($_SERVER["HTTPS"]) ? "http://" : "https://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];

if(!strstr($referer,$flg) && !strstr($referer,$url)){
	header("Location:contact.php");
	exit;	
}

require_once(ROOT_PATH.'Controllers/jleague_controller.php');

$mode=$_POST["mode"];



$Confirm=new jleague_controller();
$Validation=new jleague_controller();
$params_vali=$Validation->vali();
$Complete=new jleague_controller();



#条件分岐
if($mode=="post"){
	$params_conf=$Confirm->conf();
}elseif($mode=="send"){
	$comp=$Complete->send();	
}



?>