<?php 

session_start();

require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$Login=new jleague_controller();
$params=$Login->login();

$_SESSION["user_email"]=$_POST["email"];


?>