<?php 

class Confirm{
	public function conf_form(){
		
		$_SESSION["name"]=$_POST["name"];
		$_SESSION["email"]=$_POST["email"];
		$_SESSION["text"]=$_POST["text"];
		
		#入力情報の情報系

		$name=$_POST["name"];
		$email=$_POST["email"];
		$text=$_POST["text"];
		$mode=$_POST["mode"];
		
		
		#HTMLの無効化
		$name=htmlspecialchars($name,ENT_QUOTES,"UTF-8");
		$email=htmlspecialchars($email,ENT_QUOTES,"UTF-8");
		$text=htmlspecialchars($text,ENT_QUOTES,"UTF-8");

		
		#確認画面を読み込む
		$conf=fopen("tmpl/confirm.tmpl","r")or die;
		$size=filesize("tmpl/confirm.tmpl");
		$data=fread($conf,$size);
		fclose($conf);
		
		#置換
		$data=str_replace("!name!",$name,$data);
		$data=str_replace("!email!",$email,$data);	
		$data=str_replace("!text!",nl2br($text),$data);
		
		#表示
		echo $data;
		exit;	
	}
	
}

?>