<?php 

require_once(ROOT_PATH.'/models/Db.php');


class Complete_register extends Db{
	
		public function __construct($dbh=null){
			parent::__construct($dbh);	
		}


	public function send_register(){
				
		$_SESSION["name"]=$_POST["name"];
		$_SESSION["email"]=$_POST["email"];
		$_SESSION["password"]=$_POST["password"];
		$_SESSION["user_name"]=$_POST["user_name"];
		
		#入力情報の情報系

		$name=$_POST["name"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$user_name=$_POST["user_name"];
		$mode=$_POST["mode"];
		
		
		#HTMLの無効化
		$name=htmlspecialchars($name,ENT_QUOTES,"UTF-8");
		$email=htmlspecialchars($email,ENT_QUOTES,"UTF-8");
		$password=htmlspecialchars($password,ENT_QUOTES,"UTF-8");
		$user_name=htmlspecialchars($user_name,ENT_QUOTES,"UTF-8");
		
		#改行処理
		$name=str_replace("\r\n","",$name);
		$name=str_replace("\r","",$name);
		$name=str_replace("\n","",$name);
				
		$email=str_replace("\r\n","",$email);
		$email=str_replace("\r","",$email);
		$email=str_replace("\n","",$email);
		
		$password=str_replace("\r\n","\t",$password);
		$password=str_replace("\r","\t",$password);
		$password=str_replace("\n","\t",$password);
		
		$user_name=str_replace("\r\n","\t",$user_name);
		$user_name=str_replace("\r","\t",$user_name);
		$user_name=str_replace("\n","\t",$user_name);
		
		$password=password_hash($password, PASSWORD_DEFAULT);
		
		try{
		
			$this->dbh->beginTransaction();
			
			$SQL="INSERT INTO user_table VALUES('NULL','$name','$email','$password','$user_name',now())";
			$this->dbh->query($SQL);
			
			$this->dbh->commit();
			
		}catch(PDOException $e){
			$this->dbh->rollback();
			echo('エラー内容'.$e->getMessage());
			die();	
		}
		
		#ファイルオープン
		$conf=fopen("tmpl/complete_register.tmpl","r")or die;
		$size=filesize("tmpl/complete_register.tmpl");
		$data=fread($conf,$size);
		fclose($conf);
		
		
		#表示
		echo $data;
		
		$_SESSION=array();
			
	
		exit;

	}
	
}



?>