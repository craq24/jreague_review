<?php require_once("header.php"); ?>

<?php 

$referer=$_SERVER['HTTP_REFERER'];
$flg=$_SESSION["admin_flg"];

$_SESSION["e_u_m_flg"]=(empty($_SERVER["HTTPS"]) ? "http://" : "https://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];	



require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$user_master=new jleague_controller();
$params=$user_master->user_master();

?>

<h1 class="margin" align="center">ユーザー管理一覧</h1>

<table class="margin">
	<tr>
    	<th>id</th>
    	<th>名前</th>
    	<th>メールアドレス</th>
    	<th>ユーザーネーム</th>
    	<th>登録日時</th>
    </tr>
<?php foreach($params['user_master'] as $line): ?>
	<tr>
        <td><?php echo $line['id'];?></td>
        <td><?php echo $line['name'];?></td>
        <td><?php echo $line['email'];?></td>
        <td><?php echo $line['user_name'];?></td>
        <td><?php echo $line['created_at'];?></td>
        <td><a href="user_master_edit.php?u_id=<?php echo $line['id'];?>">編集</a></td>
        <td><a href="delete_master_user.php?u_d_id=<?php echo $line['id'];?>" onclick='return confirm("削除しますか？")';>削除</a></td>
    </tr>
<?php endforeach; ?>
</table>

<div class="btn_reg"><a href="index.php">戻る</a></div>

<?php require_once("footer.php"); ?>
