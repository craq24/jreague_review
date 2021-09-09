<?php 

require_once(ROOT_PATH.'/models/Db.php');

class Delete_comment extends Db{

	public function __construct($dbh=null){
		parent::__construct($dbh);			
	}

	public function delete_comment(){
		
		$del=$_GET['del_id'];
		
		try{
			
			$sql="DELETE FROM review_table WHERE review_id=:del";
			$sth=$this->dbh->prepare($sql);
			$sth->bindParam(':del', $del, PDO::PARAM_INT);
			$sth->execute();	
						
			echo "id".$del."のコメントを削除しました。<br>\n<br>\n";
			echo "<a href='index.php'>トップへ戻る</a>";
			
			
		}catch(PDOException $e){
			echo('エラー内容'.$e->getMessage());
			die();	
		}

	
	}
	
}


?>