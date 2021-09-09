<?php session_start(); 

$_SESSION["flg"]=(empty($_SERVER["HTTPS"]) ? "http://" : "https://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];	


require_once("header.php"); 

?> 
   

    <div id="inner_form">
        <div id="form_contents">
            <h2>お問い合わせ</h2>
            <form action="form.php" method="post">
                <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
                <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
                <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
                <p><span>*</span>は必須項目となります。</p>
                
                <dl>
                    <dt>
                        <label for="name">お名前<span>*</span></label>
                    </dt>
                    <dd>
                        <input type="text" name="name" id="name" placeholder="久保卓大" value="<?php if(isset($_SESSION["name"])){echo $_SESSION["name"];} ?>">
                    </dd>    
    
                    <dt>
                        <label for="email">メールアドレス<span>*</span></label>
                    </dt>
                    <dd>
                        <input type="text" name="email" id="email" placeholder="xxxx@xxx.com" value="<?php if(isset($_SESSION["email"])){echo $_SESSION["email"];} ?>">
                    </dd>
    
                </dl>
                
                <h3 class="margin">お問い合わせ内容をご記入ください<span>*</span></h3>
                
                <dl>
                    <dd><textarea name="text" id="text"><?php if(isset($_SESSION["text"])){echo $_SESSION["text"];} ?></textarea></dd>
                    <input type="hidden" name="mode" value="post">
                    <dd><button onClick="return validate();" type="submit">送　信</button></dd>
                </dl>
            </form>
        </div>
    </div>

<?php require_once("footer.php"); ?>    
