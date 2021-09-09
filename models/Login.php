<?php 

require_once(ROOT_PATH.'/models/Db.php');

class Login extends Db{
	
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

	
	public function login(){
		$email=$_POST['email'];
		$password=$_POST['password'];

		
		$sql="SELECT * FROM user_table WHERE email=?";
		$sth=$this->dbh->prepare($sql);
		$sth->execute(array($email));
		$result=$sth->fetch(PDO::FETCH_ASSOC);
		
		if(!isset($result['email'])){
			echo "<p>メールアドレスまたはパスワードが間違っています。</p>";
			echo "<a href='login.php'>戻る</a>";
			return false;
		}
		
		if(password_verify($password,$result['password'])){
			$_SESSION["user_id"]=$result["id"];
			header('Location:index.php');
			
		}else{
			echo "<p>メールアドレスまたはパスワードが間違っています。</p>";
			echo "<a href='login.php'>戻る</a>";

			exit;
		}
		
		
		
	}


	
}



?>