<?php 

require_once(ROOT_PATH.'/models/Db.php');

class Password_reset extends Db{
	
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

	
	public function password_reset(){
		
		$email=$_POST['email'];


		
		$sql="SELECT * FROM user_table WHERE email=?";
		$sth=$this->dbh->prepare($sql);
		$sth->execute(array($email));
		$result=$sth->fetch(PDO::FETCH_ASSOC);
		
		$name=$result["name"];



		
		if(!empty($result)){
			$new_pass=chr(mt_rand(65,90)).chr(mt_rand(65,90)).chr(mt_rand(65,90)).chr(mt_rand(65,90)).chr(mt_rand(65,90)).chr(mt_rand(65,90)).chr(mt_rand(65,90)).chr(mt_rand(65,90));
			$new_pass_hash=password_hash($new_pass,PASSWORD_DEFAULT);
			
			try{
				$this->dbh->beginTransaction();
				
				$sql="UPDATE user_table SET password='".$new_pass_hash."' WHERE email=:email";
				$sth=$this->dbh->prepare($sql);
				$sth->bindParam(':email',$email,PDO::PARAM_INT);
				$sth->execute();
				
$mailto="craques24kai@gmail.com";

#送信内容---自分へ
			
$date=date("Y/m/d H:i:s");
$ip=getenv("REMOTE_ADDR");

			
$body=<<<_FORM_
パスワードのお忘れのご連絡がありました。
		
日時：$date
IP情報：$ip
名前：$name
メールアドレス：$email
_FORM_;
		
#送信内容控え---相手へ
$body2=<<<_FORMS_
お客様のパスワードのお忘れの送信控えメールです。
新しいパスワードを確認してログインしてください。
パスワードの変更は出来ません。
			
日時：$date
名前：$name
メールアドレス：$email
新しいパスワード$new_pass
_FORMS_;
			
#送信--自分に通知
mb_language("japanese");
mb_internal_encoding("UTF-8");
$name_sendonly="送信専用アドレス";
$name_sendonly=mb_encode_mimeheader($name_sendonly);
$mail_sendonly="craques24kai@gmail.com";
$mailfrom="From:".$name_sendonly."<".$mail_sendonly.">";
$subject="フォームから連絡がありました。";
mb_send_mail($mailto,$subject,$body,$mailfrom);	
$subject2="フォーム送信控えメール";
mb_send_mail($email,$subject2,$body2,$mailfrom);
			
echo "<h2 align=\"center\">メール送信送信完了</h2>";
echo "<p align=\"center\">メールを送信しました。<br>ご確認後ログインしてください。<br>";
echo "<a href=\"login.php\">ログイン画面に戻る</a></p>";
			
echo "<div style=\"margin:2%\"></div>";



											
				$this->dbh->commit();
							
				
			}catch(PDOException $e){
				
				$this->dbh->rollback();
	
				echo('エラー内容'.$e->getMessage());
				
				die();	
			}
	
			
			
		}else{
			echo "入力されたメールアドレスは存在しません";
			exit;
		}	
	}
	
}
?>