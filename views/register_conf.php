<?php 

session_start();

$referer=$_SERVER['HTTP_REFERER'];
$flg=$_SESSION["flg"];


#ダイレクトアクセス

$url=(empty($_SERVER["HTTPS"]) ? "http://" : "https://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];

if(!strstr($referer,$flg) && !strstr($referer,$url)){
	header("Location:register.php");
	exit;	
}


require_once(ROOT_PATH.'Controllers/jleague_controller.php');

$Confirm_register=new jleague_controller();
$Complete_register=new jleague_controller();

$mode=$_POST["mode"];

#条件分岐
if($mode=="post"){
	$conf_regi=$Confirm_register->conf_regi();
}elseif($mode=="send"){
	$comp_regi=$Complete_register->send_regi();
}









?>