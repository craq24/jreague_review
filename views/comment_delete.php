<?php 

session_start();



require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$Delete=new jleague_controller();
$params_del=$Delete->comment_delete();

?>