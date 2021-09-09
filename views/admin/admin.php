<?php 

require_once("header.php"); 

$_SESSION["index_flg"]=(empty($_SERVER["HTTPS"]) ? "http://" : "https://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];

?>

    <h1 id="login_h1" class="margin">管理者ログイン画面</h1>

    <div id="login_form">
        <div id="login_contents">
            <form action="login_conf_admin.php" method="post">
                   <dl>    
                        <dt>
                            <label for="name">名前</label>
                        </dt>
                        <dd>
                            <input type="text" name="admin_name" id="name" placeholder="山田太郎" value="">
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            <label for="password">パスワード</label>
                        </dt>
                        <dd>
                            <input type="text" name="admin_password" id="password" placeholder="半角英数字" value="">
                        </dd>    
                    </dl>	
                    <dl>
                        <dd class="btn_center"><button type="submit">送　信</button></dd>
                    </dl>
            </form>
        </div>
    </div>

<?php require_once("footer.php"); ?>