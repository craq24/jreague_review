<?php session_start(); 

$_SESSION["flg"]=(empty($_SERVER["HTTPS"]) ? "http://" : "https://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];	

/*require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$ajax_email=new jleague_controller();
$params=$ajax_email->ajax_email();
*/


require_once("header.php"); 

?> 

    <div id="inner_form">
        <div id="form_contents">
            <h2>新規登録</h2>
            <form action="register_conf.php" method="post" id="form">
                <p><span>*</span>は必須項目となります。</p>
                
                <dl>
                    <dt>
                        <label for="name">お名前<span>*</span></label>
                    </dt>
                    <dd>
                        <input type="text" name="name" id="name" placeholder="久保卓大" value="">
                    </dd>    
    
                    <dt>
                        <label for="email">メールアドレス<span>*</span></label>
                        <div id="message"></div>
                    </dt>
                    <dd>
                        <input type="text" name="email" id="email" placeholder="xxxx@xxx.com" value="">
                    </dd>
                    <dt>
                        <label for="password">パスワード<br>登録後変更は出来ません<span>*</span></label>
                    </dt>
                    <dd>
                        <input type="text" name="password" id="password" placeholder="xxxx11111" value="">
                    </dd>
                    <dt>
                    	<label for="password_conf">パスワードの確認<span>*</span></label>
                    </dt>
                    <dd>
                        <input type="text" name="password_conf" id="password_conf" placeholder="xxxx11111" value="">
                    </dd>

                    <dt>
                        <label for="user_name">ユーザーネーム</label>
                    </dt>
                    <dd>
                        <input type="text" name="user_name" id="user_name" placeholder="hogehoge01" value="">
                    </dd>
                </dl>                                
                <dl>
                    <dd><button type="submit" onClick="return validate_register()" id="button">送　信</button></dd>
                </dl>
                <input type="hidden" name="mode" value="post">
            </form>
        </div>
        
       <div class="btn_reg"><p><a href="index.php">戻る</a></p></div>

    </div>
    
    
<?php require_once("footer.php"); ?>
