<?php 

session_start();

$referer=$_SERVER['HTTP_REFERER'];

$flg=$_SESSION["e_u_m_e_flg"];



if(!strstr($referer,$flg)){
	header("Location:index.php");
	exit;	
}


require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$update=new jleague_controller();
$params=$update->u_m_edit();



?>