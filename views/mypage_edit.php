<?php 

session_start(); 




require_once("header.php"); 

require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$Edits=new jleague_controller();
$params=$Edits->mypage_edit();
$detail=$params['view'];


?> 

    <div id="inner_form">
        <div id="form_contents">
            <h2>ユーザー編集画面</h2>
            <form action="mypage_update.php" method="post">
                <p><span>*</span>は必須項目となります。</p>
                
                <dl>
                    <dt>
                        <label for="name">お名前<span>*</span></label>
                    </dt>
                    <dd>
                        <input type="text" name="name" id="name" placeholder="久保卓大" value="<?php echo $detail['name']; ?>">
                    </dd>    
    
                    <dt>
                        <label for="email">メールアドレス<span>*</span></label>
                    </dt>
                    <dd>
                        <input type="text" name="email" id="email" placeholder="xxxx@xxx.com" value="<?php echo $detail['email']; ?>">
                    </dd>

                    <dt>
                        <label for="user_name">ユーザーネーム<span>*</span></label>
                    </dt>
                    <dd>
                        <input type="text" name="user_name" id="user_name" placeholder="hogehoge01" value="<?php echo $detail['user_name']; ?>">
                    </dd>
                </dl>                                
                <dl>
                    <dd><button type="submit" onClick="return validate_register()">送　信</button></dd>
                </dl>
                <input type="hidden" name="id_u" value="<?php echo $detail['id']; ?>">
            </form>
        </div>
    </div>

<?php require_once("footer.php"); ?>    
