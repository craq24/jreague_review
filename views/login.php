<?php session_start(); ?>

<?php require_once("header.php"); ?>
    
    <div id="login_form">
        <div id="login_contents">
            <h1 id="login_h1">ログイン</h1>
            <form action="login_conf.php" method="post" id="form">
                   <dl>    
                        <dt>
                            <label for="name">メールアドレス</label>
                        </dt>
                        <dd>
                            <input type="text" name="email" id="email" placeholder="xxxx@xxx.com" value="">
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            <label for="password">パスワード</label>
                        </dt>
                        <dd>
                            <input type="text" name="password" id="password" placeholder="半角英数字" value="">
                        </dd>    
                    </dl>
                    <dl>
                        <dd class="btn_center"><button type="submit" id="button">送　信</button></dd>
                    </dl>

    
            </form>
        </div>
    </div>
    
    
	<div class="btn_reg"><a href="index.php">戻る</a></div>
    <div align="center" style="margin-bottom:2%"><a href="password_reset.php">パスワードを忘れた方はこちら</a></div>
    



<?php require_once("footer.php"); ?> 