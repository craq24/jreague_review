<?php 

class Confirm_register{
	public function conf_register(){
		
		$_SESSION["name"]=$_POST["name"];
		$_SESSION["email"]=$_POST["email"];
		$_SESSION["password"]=$_POST["password"];
		$_SESSION["user_name"]=$_POST["user_name"];
		
		#入力情報の情報系

		$name=$_POST["name"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$user_name=$_POST["user_name"];
		$mode=$_POST["mode"];
		
		
		#HTMLの無効化
		$name=htmlspecialchars($name,ENT_QUOTES,"UTF-8");
		$email=htmlspecialchars($email,ENT_QUOTES,"UTF-8");
		$password=htmlspecialchars($password,ENT_QUOTES,"UTF-8");
		$user_name=htmlspecialchars($user_name,ENT_QUOTES,"UTF-8");

		
		#確認画面を読み込む
		$conf=fopen("tmpl/confirm_register.tmpl","r")or die;
		$size=filesize("tmpl/confirm_register.tmpl");
		$data=fread($conf,$size);
		fclose($conf);
		
		#置換
		$data=str_replace("!name!",$name,$data);
		$data=str_replace("!email!",$email,$data);	
		$data=str_replace("!password!",$password,$data);	
		$data=str_replace("!user_name!",$user_name,$data);	
		
		#表示
		echo $data;
		exit;	
	}
	
}

?>