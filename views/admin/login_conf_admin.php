<?php 

session_start();

$_SESSION['admin_name']=$_POST['admin_name'];
$_SESSION['admin_password']=$_POST['admin_password'];

$index_flg=$_SESSION['index_flg'];
$admin_name=$_SESSION['admin_name'];
$admin_password=$_SESSION['admin_password'];
$referer=$_SERVER['HTTP_REFERER'];

$_SESSION["login_conf_flg"]=(empty($_SERVER["HTTPS"]) ? "http://" : "https://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];




if(!strstr($referer,$index_flg)){
	header("Location:admin.php");
	exit;	
}


require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$Login_ad=new jleague_controller();
$params=$Login_ad->login_ad();




?>