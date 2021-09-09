<?php 

session_start();

if(isset($_SESSION["user_email"])){
	$user=$_SESSION["user_email"];
}


/*$referer=$_SERVER['HTTP_REFERER'];
$flg=$_SESSION["flg"];

if(!strstr($referer,$flg)){
	header("Location:contact.php");
	exit;	
}

$_SESSION["e_flg"]=(empty($_SERVER["HTTPS"]) ? "http://" : "https://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];	


*/
$_SESSION['p_id']=$_GET['p_id'];

require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$Edits=new jleague_controller();
$params=$Edits->view_p();
$detail=$params['view'];

$controller=new jleague_controller();
$commnents=$controller->findcomment();
//$comment=$commnents['comment'];findBycommentの時

if(isset($_SESSION['user_id'])){$user_id=$_SESSION["user_id"];}



?>

<?php require_once("header.php"); ?>


<div align="center" class="margin">
    <table>
    	<tr><th>タイトル：<?php echo $detail['article_name']; ?></th></tr>
        <tr><td><?php echo html_entity_decode($detail['article_text']); ?></td></tr>

<?php if(isset($user)):?>  		
        	<form action="comment_review.php" method="post">
            	<tr><td><textarea name="comment" rows="15" cols="100"></textarea></td></tr>
                <input type="hidden" name="article_id" value="<?php echo $_GET["p_id"]; ?>">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <tr><td><button type="submit">送　信</button></td></tr>
            </form>
<?php endif; ?>
        
    </table>
</div>

<div class="tab">
	<ul class="flex"><li class="user">ユーザーネーム</li><li class="center_positions">コメント</li></ul>
<?php foreach($commnents['comment'] as $comment): ?>
	<?php if($comment['article_id']==$_GET['p_id']): ?>
		<ul class="flex">
        	<li class="user"><?php echo $comment['user_name']; ?></li>
            <li class="center_position"><?php echo $comment['review']; ?></li>
           <?php if(isset($_SESSION['user_id'])): ?>
            <?php $user_id=$_SESSION["user_id"]; ?>
            <?php if($user_id==$comment["user_id"]): ?>
            <li class="edit_del"><a href="comment_edit.php?edit_id=<?php echo $comment["review_id"]; ?>">編集</a></li>    
            <li class="edit_del"><a href="comment_delete.php?del_id=<?php echo $comment["review_id"]; ?>" onclick="return confirm('削除しますか？')">削除</a></li>
            <?php endif; ?>
           <?php endif; ?>
        </ul>

    <?php endif; ?>
<?php endforeach; ?>
</div>

<div class="btn_reg"><a href="index.php">戻る</a></div>


<?php require_once("footer.php"); ?>
