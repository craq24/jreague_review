<?php 

session_start();

require_once("header.php");

echo "<div style=\"margin:2%\"></div>";

require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$reset=new jleague_controller();
$params=$reset->password_reset();


?>