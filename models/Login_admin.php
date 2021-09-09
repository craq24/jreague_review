<?php 

require_once(ROOT_PATH.'/models/Db.php');

class Login_ad extends Db{
	
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }
	
	public function login_admin(){
		
		$admin_name=$_POST['admin_name'];
		$admin_password=$_POST['admin_password'];
		
		$sql="SELECT * FROM admin_table WHERE admin_name=?";
		$sth=$this->dbh->prepare($sql);
		$sth->execute(array($admin_name));
		$result=$sth->fetch(PDO::FETCH_ASSOC);
		
		if(!isset($result['admin_name'])){
			echo "<p>名前またはパスワードが間違っています。</p>";
			echo "<a href='index.php'>戻る</a>";
			return false;
		}
		
		if(password_verify($admin_password,$result['admin_password'])){
			header('Location:index.php');
		}else{
			echo "<p>名前またはパスワードが間違っています。</p>";
			echo "<a href='admin.php'>戻る</a>";
			
			exit;
		}
		
	}

}

/*
管理者名：吉田開
パスワード：kai212459
*/



?>