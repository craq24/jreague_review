<?php 

session_start();

require_once("header.php"); 

if(isset($_SESSION['user_id'])){$user_id=$_SESSION["user_id"];}

require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$Edits=new jleague_controller();
$params=$Edits->findBycomment();
$detail=$params['comment'];


?>

<h2 align="center" style="margin:2% auto">- コメント編集　-</h2>

<table>
<form action="comment_update.php" method="post">
    <tr><td><textarea name="comment" rows="15" cols="100"><?php echo $detail["review"]; ?></textarea></td></tr>
    <input type="hidden" name="comment_id" value="<?php echo $_GET["edit_id"]; ?>">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type="hidden" name="article_id" value="<?php echo $detail["article_id"]; ?>">
    <tr><td><button type="submit">送　信</button></td></tr>
</form>
</table>

<div class="btn_reg"><a href="review_page.php?p_id=<?php echo $detail["article_id"]; ?>">戻る</a></div>

<?php require_once("footer.php"); ?>