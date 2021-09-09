<?php 

class Validation{
	
	
	public function validate(){
		
		$name=$_POST["name"];
		$email=$_POST["email"];
		$text=$_POST["text"];
		$mode=$_POST["mode"];

		
		$error_mes="";

		if($name==""){
			$error_mes.="名前が未入力です<br>\n";
		}elseif(mb_strlen($name,'utf-8')>10){
			$error_mes.="名前は10文字以内でご記入ください。<br>\n";	
		}
				
		if($email==""){
			$error_mes.="メールアドレスが未入力です。<br>\n";	
		}elseif(!preg_match("/\w+@\w+/",$email)){
			$error_mes.="メールアドレスを正しく入力してください。<br>\n";	
		}
		
		if($text==""){
			$error_mes.="お問い合わせ内容を入力してください。<br>\n";
		}
		
		if(!empty($error_mes)){echo $this->error($error_mes);}
		
	
	}
	
	public function error($erm){
		#エラーファイルを読み込む
		$error=fopen("tmpl/error.tmpl","r")or die;
		$size=filesize("tmpl/error.tmpl");
		$data=fread($error,$size);
		fclose($error);	
			
		#置換
		$data=str_replace("!message!",$erm,$data);
			
		#表示する
		echo $data;
		exit;
	}



}


?>