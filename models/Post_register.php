<?php 


class Post_comp extends Db{
	
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }
	
	public function post_comp(){
		
		$title=$_POST["title"];
		$review=$_POST['review'];
		
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
			
			$SQL="INSERT INTO article_table VALUES('NULL','$title','$review',now())";
			$this->dbh->query($SQL);
			
			$this->dbh->commit();
			
		}catch(PDOException $e){
			$this->dbh->rollback();
			echo('エラー内容'.$e->getMessage());
			die();	
		}
		
		header('Location:index.php');
		
		exit;

	}
	
	public function findall(){
		$sql='SELECT * FROM article_table ORDER BY created_at DESC';
		$sth=$this->dbh->prepare($sql);
		$sth->execute();
		$result=$sth->fetchAll(PDO::FETCH_ASSOC);
		return $result;				
	}
	
	public function findById($id=0):Array{
		$sql='SELECT * FROM article_table WHERE article_id=:id';
		$sth=$this->dbh->prepare($sql);
		$sth->bindParam(':id',$id,PDO::PARAM_INT);
		$sth->execute();
		$result=$sth->fetch(PDO::FETCH_ASSOC);
		return $result;	
	}
	
	public function findcomment(){
		$sql='SELECT * FROM review_table r,user_table u WHERE r.user_id=u.id ORDER BY r.created_at DESC';
		$sth=$this->dbh->prepare($sql);
		$sth->execute();
		$result=$sth->fetchAll(PDO::FETCH_ASSOC);
		return $result;				
	}
	
	public function findBycomment($id=0):Array{
		$sql='SELECT r.review,u.user_name,r.article_id FROM review_table r,article_table a,user_table u WHERE r.article_id=:id AND u.id=r.user_id;';
		$sth=$this->dbh->prepare($sql);
		$sth->bindParam(':id',$id,PDO::PARAM_INT);
		$sth->execute();
		$result=$sth->fetch(PDO::FETCH_ASSOC);
		return $result;	
	}

}




?>