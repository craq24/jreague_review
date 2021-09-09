<?php 

session_start();

$referer=$_SERVER['HTTP_REFERER'];
$flg=$_SESSION["postreg_flg"];

if(!strstr($referer,$flg)){
	header("Location:index.php");
	exit;	
}


require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$post_comp=new jleague_controller();
$params=$post_comp->post_comp();


?>