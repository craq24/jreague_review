<?php
session_start();
if(empty($_SESSION['admin_name'])){
header('Location:admin.php');
exit;	
}
$_SESSION["admin_flg"]=(empty($_SERVER["HTTPS"]) ? "http://" : "https://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
require_once("header.php");
?>

<h1 align="center" class="margin">- 管理画面 -</h1>


 <div class="btn_reg"><a href="post_register.php">新規投稿</a></div>
 <div class="btn_reg"><a href="user_master.php">ユーザー管理</a></div>

<div id="search_box">
    <form action="search.php" method="post">
    	<p style="margin:1%">記事検索：<input type="text" id="search_word" name="search_word"><button type="submit" id="sbtn"><span class="material-icons">search</span></button></p>
    </form>
</div>


<h2 class="margin" align="center">- レビュー記事一覧 -</h2>


<table><?php 

require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$post_display=new jleague_controller();
$params=$post_display->post_display();

foreach($params['post_display'] as $line){
	echo "<tr><td><a href=\"review_page.php?p_id=".$line['article_id']."\">".$line['article_name']."</a></td>";
	echo "<td><a href=\"edit.php?edit_id=".$line['article_id']."\">編集</a></td>";
	echo "<td><a href=\"delete.php?del_id=".$line['article_id']."\" onclick='return confirm(\"削除しますか？\");'>削除</a></td></tr>";	
}

?>
</table>









<?php require_once("footer.php"); ?>