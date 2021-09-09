<?php 

session_start();

$referer=$_SERVER['HTTP_REFERER'];
$flg=$_SESSION["admin_flg"];

if(!strstr($referer,$flg)){
	header("Location:index.php");
	exit;	
}

$_SESSION["e_flg"]=(empty($_SERVER["HTTPS"]) ? "http://" : "https://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];	



$_SESSION['edit_id']=$_GET['edit_id'];

require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$Edits=new jleague_controller();
$params=$Edits->view_e();
$detail=$params['view_e'];



?>


<?php require_once("header.php"); ?>

<h1 align="center" class="margin">レビュー編集画面</h1>

<div align="center" class="margin">
    <form method="POST" action="update.php">
    	<div>タイトル：<input type="text" name="title" value="<?php echo $detail['article_name']; ?>" id="title_style"></div>
        <textarea id="elm1" name="review" rows="15" style="width:100%"><?php echo $detail['article_text']; ?></textarea>
        <input type="hidden" name="id" id="id" value="<?php echo $detail['article_id'];?>">
    <p>&nbsp;</p>
    <button type="button" onClick="this.disabled=true; this.value='処理中です.......'; this.form.submit();" style="padding: 5px 30px;">再投稿</button>
    </form>
    <div class="btn_reg"><a href="index.php">戻る</a></div>

</div>

<?php require_once("footer.php"); ?>
