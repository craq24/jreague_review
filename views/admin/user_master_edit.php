<?php session_start(); 

$_SESSION["e_u_m_e_flg"]=(empty($_SERVER["HTTPS"]) ? "http://" : "https://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];	

$referer=$_SERVER['HTTP_REFERER'];
$flg=$_SESSION["e_u_m_flg"];

if(!strstr($referer,$flg)){
	header("Location:index.php");
	exit;	
}



require_once("header.php"); 

require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$Edits=new jleague_controller();
$params=$Edits->view_master_user();
$detail=$params['view'];


?> 

    <div id="inner_form">
        <div id="form_contents">
            <h2>ユーザー編集画面</h2>
            <form action="user_master_update.php" method="post">
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
                        <label for="user_name">ユーザーネーム<br>登録後変更は出来ません<span>*</span></label>
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
