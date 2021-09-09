<?php 
require_once("header.php"); 

$referer=$_SERVER['HTTP_REFERER'];
$flg=$_SESSION["admin_flg"];

if(!strstr($referer,$flg)){
	header("Location:admin.php");
	exit;	
}

$_SESSION["postreg_flg"]=(empty($_SERVER["HTTPS"]) ? "http://" : "https://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];


?>

<h1 align="center" class="margin">新規レビュー投稿</h1>

<div align="center" class="margin">
    <form method="POST" action="post_comp.php">
    	<div>タイトル：<input type="text" name="title" value="" id="title_style"></div>
        <textarea id="elm1" name="review" rows="15" style="width:100%"></textarea>
    <p>&nbsp;</p>
    <button type="button" onClick="this.disabled=true; this.value='処理中です.......'; this.form.submit();" style="padding: 5px 30px;">投稿</button>
    <div class="btn_reg"><a href="index.php">戻る</a></div>
    </form>
</div>

<?php require_once("footer.php"); ?>

