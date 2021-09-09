<?php require_once("header.php"); ?>

<?php 

require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$Edits=new jleague_controller();
$params=$Edits->view_master_user();
$detail=$params['view'];

?>

    <div id="inner_form">
        <div id="form_contents">
            <h2> - ユーザープロフィール - </h2>
                
                <ul class="flex_dis">
                    <li style="color:#39F" class="margin_rows">
                        お名前
                    </li>
                    <li class="margin_rows">
                        <?php echo $detail['name']; ?>
                    </li>    
    
                    <li style="color:#39F" class="margin_rows">
                        メールアドレス
                    </li>
                    <li class="margin_rows">
                        <?php echo $detail['email']; ?>
                    </li>

                    <li style="color:#39F" class="margin_rows">
                        ユーザーネーム
                    </li>
                    <li class="margin_rows">
                        <?php echo $detail['user_name']; ?>
                    </li>
                    <li class="margin_rows"><a href="mypage_edit.php?edit_id=<?php echo $_GET["u_id"]; ?>">編集</a></li>
                </ul>                                
        </div>
    </div>

   <div class="btn_reg"><p><a href="index.php">トップページに戻る</a></p></div>



<?php require_once("footer.php"); ?>