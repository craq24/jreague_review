<?php 

session_start();

$referer=$_SERVER['HTTP_REFERER'];
$flg=$_SESSION["e_flg"];

if(!strstr($referer,$flg)){
	header("Location:index.php");
	exit;	
}



require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$update=new jleague_controller();
$params=$update->edit_id();



?>