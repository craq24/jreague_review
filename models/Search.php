<?php 


class Search extends Db{
	
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }
	
		
	
		public function search(){
			$sql="SELECT * FROM article_table WHERE article_name LIKE '%".$_POST["search_word"]."%'";
			$sth=$this->dbh->prepare($sql);
			$sth->execute();
			$result=$sth->fetchAll(PDO::FETCH_ASSOC);
			return $result;				
		}
			

}





?>