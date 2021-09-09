<?php 


class Comment_register extends Db{
	
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }
	
	public function comment_reg(){
		
		$comment=$_POST["comment"];
		$articles_id=$_POST["article_id"];
		$users_id=$_POST["user_id"];
		
		$error_mes="";

		if($comment==""){
			$error_mes.="コメントが未入力です<br>\n";
		}
		
		if(!empty($error_mes)){
			echo $error_mes;
			echo "<button onClick=\"history.back()\">戻る</button>";
			exit;
		}

		
		#HTMLの無効化
		$comment=htmlspecialchars($comment,ENT_QUOTES,"UTF-8");
		
		#改行処理
		$comment=str_replace("\r\n","",$comment);
		$comment=str_replace("\r","",$comment);
		$comment=str_replace("\n","",$comment);
						
		try{
		
			$this->dbh->beginTransaction();
			
			$SQL="INSERT INTO review_table VALUES('NULL','$articles_id','$users_id','$comment',now())";
			$this->dbh->query($SQL);
			
			$this->dbh->commit();
			
		}catch(PDOException $e){
			$this->dbh->rollback();
			echo('エラー内容'.$e->getMessage());
			die();	
		}
		
		$a="review_page.php?p_id=$articles_id";
		header('Location:'.$a);
				
		exit;

	}	

}




?>