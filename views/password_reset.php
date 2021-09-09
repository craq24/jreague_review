<?php require_once("header.php"); ?>

<h1 align="center" style="margin:2% auto">パスワードをお忘れの方へ</h1>

<p align="center" style="margin:2% auto">恐れ入りますが、登録されたメールアドレスをご入力頂き受信されたメールアドレスの案内に従ってパスワードの再設定をお願い致します。</p>

<form action="password_sendurl.php" method="post">
	<p align="center" style="margin:2% auto">メールアドレス：<input type="text" name="email" placeholder="aaa@aaa.com"></p>
    <p align="center" style="margin:2% auto"><button type="submit" style="width:100px">送信</button></p>
</form>

<?php require_once("footer.php"); ?>