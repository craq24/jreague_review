<?php 

require_once(ROOT_PATH.'/models/Db.php');

class Edit extends Db{
	
	public function __construct($dbh=null){
		parent::__construct($dbh);			
	}
	
	public function editUpdate(){
		

		
		$title=$_POST["title"];
		$review=$_POST["review"];
		$id_l=$_POST["id"];
		
		$error_mes="";

		if($title==""){
			$error_mes.="タイトルが未入力です<br>\n";
		}
		
		if($review==""){
			$error_mes.="内容が未入力です<br>\n";
		}
		
		if(!empty($error_mes)){
			echo $error_mes;
			echo "<button onClick=\"history.back()\">戻る</button>";
			exit;
		}

		#HTMLの無効化
		$title=htmlspecialchars($title,ENT_QUOTES,"UTF-8");
		$review=htmlspecialchars($review,ENT_QUOTES,"UTF-8");
		
		#改行処理
		$title=str_replace("\r\n","",$title);
		$title=str_replace("\r","",$title);
		$title=str_replace("\n","",$title);
				
		$review=str_replace("\r\n","",$review);
		$review=str_replace("\r","",$review);
		$review=str_replace("\n","",$review);
	

		
		try{
			$this->dbh->beginTransaction();
			
			$sql="UPDATE article_table SET article_name='".$title."',article_text='".$review."' WHERE article_id=:edit_id";
			$sth=$this->dbh->prepare($sql);
			$sth->bindParam(':edit_id',$id_l,PDO::PARAM_INT);
			$sth->execute();
			
			echo "編集が完了しました。<br>\n<br>\n";
			
			echo "<a href='index.php'>一覧へ戻る</a>";
			$this->dbh->commit();
						
			
		}catch(PDOException $e){
			
			$this->dbh->rollback();

			echo('エラー内容'.$e->getMessage());
			
			die();	
		}

		


	}
	
}











?>