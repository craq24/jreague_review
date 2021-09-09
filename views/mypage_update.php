<?php 

session_start();

require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$update=new jleague_controller();
$params=$update->mypage_editupdate();



?>