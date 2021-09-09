<?php 

require_once(ROOT_PATH.'/models/Db.php');

class Delete extends Db{

	public function __construct($dbh=null){
		parent::__construct($dbh);			
	}

	public function delete(){
		
		$del=$_GET['del_id'];
		
		try{
			
			$sql="DELETE FROM article_table WHERE article_id=:del";
			$sth=$this->dbh->prepare($sql);
			$sth->bindParam(':del', $del, PDO::PARAM_INT);
			$sth->execute();	
						
			echo "id".$del."を削除しました。<br>\n<br>\n";
			echo "<a href='index.php'>一覧へ戻る</a>";
			
			
		}catch(PDOException $e){
			echo('エラー内容'.$e->getMessage());
			die();	
		}

	
	}
	
}


?>