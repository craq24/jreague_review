<?php 

require_once(ROOT_PATH.'/models/Db.php');


class Complete extends Db{
	
		public function __construct($dbh=null){
			parent::__construct($dbh);	
		}


	public function send_form(){
				
		$_SESSION["name"]=$_POST["name"];
		$_SESSION["email"]=$_POST["email"];
		$_SESSION["text"]=$_POST["text"];
		
		#入力情報の情報系

		$name=$_POST["name"];
		$email=$_POST["email"];
		$text=$_POST["text"];
		$mode=$_POST["mode"];
		
		
		#HTMLの無効化
		$name=htmlspecialchars($name,ENT_QUOTES,"UTF-8");
		$email=htmlspecialchars($email,ENT_QUOTES,"UTF-8");
		$text=htmlspecialchars($text,ENT_QUOTES,"UTF-8");
		
		#改行処理
		$name=str_replace("\r\n","",$name);
		$name=str_replace("\r","",$name);
		$name=str_replace("\n","",$name);
				
		$email=str_replace("\r\n","",$email);
		$email=str_replace("\r","",$email);
		$email=str_replace("\n","",$email);
		
		$text=str_replace("\r\n","\t",$text);
		$text=str_replace("\r","\t",$text);
		$text=str_replace("\n","\t",$text);
		
		try{
		
			$this->dbh->beginTransaction();
			
			$SQL="INSERT INTO contact_table VALUES('NULL','$name','$email','$text',now())";
			$this->dbh->query($SQL);
			
			$this->dbh->commit();
			
		}catch(PDOException $e){
			$this->dbh->rollback();
			echo('エラー内容'.$e->getMessage());
			die();	
		}
		
		#ファイルオープン
		$conf=fopen("tmpl/complete.tmpl","r")or die;
		$size=filesize("tmpl/complete.tmpl");
		$data=fread($conf,$size);
		fclose($conf);
		
		
		#表示
		echo $data;
		
		$_SESSION=array();
			
	
		exit;

	}
	
}



?>