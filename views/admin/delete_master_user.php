<?php 

session_start();

require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$Delete=new jleague_controller();
$params_del=$Delete-> u_m_delete();

$_SESSION["dm_flg"]=(empty($_SERVER["HTTPS"]) ? "http://" : "https://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];	


?>