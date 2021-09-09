<?php 


class User_master extends Db{
	
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }
	
		
	
		public function userall(){
			$sql='SELECT * FROM user_table';
			$sth=$this->dbh->prepare($sql);
			$sth->execute();
			$result=$sth->fetchAll(PDO::FETCH_ASSOC);
			return $result;				
		}
	
		public function findline($id=0):Array{
			$sql='SELECT * FROM user_table WHERE id=:id';
			$sth=$this->dbh->prepare($sql);
			$sth->bindParam(':id',$id,PDO::PARAM_INT);
			$sth->execute();
			$result=$sth->fetch(PDO::FETCH_ASSOC);
			return $result;	
		}
		

}





?>