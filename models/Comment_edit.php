<?php 


class Comment_edit extends Db{
	
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }
	
	public function comment_edit_comp(){
		
		$comment=$_POST['comment'];
		$review_id=$_POST['comment_id'];
		$user_id=$_POST['user_id'];
		$article_id=$_POST['article_id'];
		
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
		$title=htmlspecialchars($comment,ENT_QUOTES,"UTF-8");
		
		#改行処理
		$title=str_replace("\r\n","",$comment);
		$title=str_replace("\r","",$comment);
		$title=str_replace("\n","",$comment);
				
		
		try{
			$this->dbh->beginTransaction();
			
			$sql="UPDATE review_table SET review='".$comment."' WHERE review_id=:review_id";
			$sth=$this->dbh->prepare($sql);
			$sth->bindParam(':review_id',$review_id,PDO::PARAM_INT);
			$sth->execute();
			
			echo "編集が完了しました。<br>\n<br>\n";
			
			echo "<a href=\"review_page.php?p_id=".$article_id."\">マイページに戻る</a>";
			
			$this->dbh->commit();
						
			
		}catch(PDOException $e){
			
			$this->dbh->rollback();

			echo('エラー内容'.$e->getMessage());
			
			die();	
		}
		

	}
		
	public function findBycomment($edit_id=0):Array{
		$sql='SELECT * FROM review_table WHERE review_id=:edit_id';
		$sth=$this->dbh->prepare($sql);
		$sth->bindParam(':edit_id',$edit_id,PDO::PARAM_INT);
		$sth->execute();
		$result=$sth->fetch(PDO::FETCH_ASSOC);
		return $result;	
	}
	
	

}




?>