<?php 

session_start();

$referer=$_SERVER['HTTP_REFERER'];
$flg=$_SESSION["admin_flg"];

if(!strstr($referer,$flg)){
	header("Location:index.php");
	exit;	
}


require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$Delete=new jleague_controller();
$params_del=$Delete->del_id();

?>