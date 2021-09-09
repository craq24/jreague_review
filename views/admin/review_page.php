<?php 

session_start();

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
$params=$Edits->view();
$detail=$params['view'];

$controller=new jleague_controller();
$commnents=$controller->findcomment();
//$comment=$commnents['comment'];findBycommentの時

if(isset($_SESSION['user_id'])){$user_id=$_SESSION["user_id"];}


?>


<?php require_once("header.php"); ?>

<h1 align="center" class="margin">レビュープレビュー</h1>

<div align="center" class="margin">
    <table>
    	<tr><th>タイトル：<?php echo $detail['article_name']; ?></th></tr>
        <tr><td><?php echo html_entity_decode($detail['article_text']); ?></td></tr>
    </table>
</div>

<div class="tab">
	<ul class="flex"><li class="user">ユーザーネーム</li><li class="center_positions">コメント</li></ul>
<?php foreach($commnents['comment'] as $comment): ?>
	<?php if($comment['article_id']==$_GET['p_id']): ?>
		<ul class="flex">
            <li class="user"><?php echo $comment['user_name']; ?></li>
            <li class="center_position"><?php echo $comment['review']; ?></li>
            <li class="edit_del"><a href="comment_edit.php?edit_id=<?php echo $comment["review_id"]; ?>">編集</a></li>    
            <li class="edit_del"><a href="comment_delete.php?del_id=<?php echo $comment["review_id"]; ?>" onclick="return confirm('削除しますか？')">削除</a></li>
        </ul>
        
    <?php endif; ?>
<?php endforeach; ?>
</div>

<div class="btn_reg"><a href="index.php">管理画面に戻る</a></div>


<?php require_once("footer.php"); ?>
