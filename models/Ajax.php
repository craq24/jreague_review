<?php 

class Ajax_email extends Db{
	
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }
	
		
	
		public function userall(){
			$sql = "SELECT COUNT(*) AS cnt FROM users WHERE email = :email";
			$sth=$this->dbh->prepare($sql);
			$sth->bindParam(':email',$email,PDO::PARAM_INT);
			$sth->execute();
			$result=$sth->fetch(PDO::FETCH_ASSOC);
			$rst[] = array(
				'count'=> $cnt['cnt']
			 );
			 
		header("Content-Type: application/json; charset=utf-8");
		header('X-Content-Type-Options: nosniff');
		
		//JSON 出力
		echo json_encode($rst);
		
			
		}
}












?>