<?php 

require_once(ROOT_PATH.'/models/Db.php');

class Edit_master_user extends Db{
	
	public function __construct($dbh=null){
		parent::__construct($dbh);			
	}
	
	public function editUpdate_master_user(){
		

		
		$name=$_POST["name"];
		$email=$_POST["email"];
		$user_name=$_POST["user_name"];
		$id_u=$_POST["id_u"];
		
		$error_mes="";

		if($name==""){
			$error_mes.="名前が未入力です<br>\n";
		}
		
		if($email==""){
			$error_mes.="メールアドレスが未入力です。<br>\n";	
		}elseif(!preg_match("/\w+@\w+/",$email)){
			$error_mes.="メールアドレスを正しく入力してください。<br>\n";	
		}
				
		if($user_name==""){
			$error_mes.="ユーザーネームが未入力です<br>\n";
		}
		
		if(!empty($error_mes)){
			echo $error_mes;
			echo "<a href=\"user_master.php\">一覧へ戻る</a>";
			exit;	
		}

		#HTMLの無効化
		$name=htmlspecialchars($name,ENT_QUOTES,"UTF-8");
		$email=htmlspecialchars($email,ENT_QUOTES,"UTF-8");
		$user_name=htmlspecialchars($user_name,ENT_QUOTES,"UTF-8");
		
		#改行処理
		$name=str_replace("\r\n","",$name);
		$name=str_replace("\r","",$name);
		$name=str_replace("\n","",$name);
				
		$email=str_replace("\r\n","",$email);
		$email=str_replace("\r","",$email);
		$email=str_replace("\n","",$email);
		
		$user_name=str_replace("\r\n","",$user_name);
		$user_name=str_replace("\r","",$user_name);
		$user_name=str_replace("\n","",$user_name);

		
		try{
			$this->dbh->beginTransaction();
			
			$sql="UPDATE user_table SET name='".$name."',email='".$email."',user_name='".$user_name."' WHERE id=:id_u";
			$sth=$this->dbh->prepare($sql);
			$sth->bindParam(':id_u',$id_u,PDO::PARAM_INT);
			$sth->execute();
			
			echo "編集が完了しました。<br>\n<br>\n";
			
			echo "<a href='user_master.php'>一覧へ戻る</a>";
			
			$this->dbh->commit();
						
			
		}catch(PDOException $e){
			
			$this->dbh->rollback();

			echo('エラー内容'.$e->getMessage());
			
			die();	
		}

		


	}
	
}











?>