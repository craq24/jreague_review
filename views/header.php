<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>J13 13人目のJリーガー</title>
<link href="css/index.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
function validate(){
	
	var mes=[];
	var error=[];

	
	if(document.getElementById("name").value==""){
		mes+="氏名は必須項目です。10文字以内でご記入ください。\n";
		error+=1;
	}else if(document.getElementById("name").value.length>10){
		mes+="氏名は必須項目です。10文字以内でご記入ください。\n";
		error+=1;	
	}
		
	if(document.getElementById("email").value==""){
		mes+="メールアドレスは必須項目です。\n";
		error+=1;
	}else if(!document.getElementById("email").value.match(/^[A-Za-z0-9]+[A-Za-z0-9\._-]*@[a-zA-Z0-9_-]+[a-zA-Z0-9\._-]+$/)){
		mes+="メールアドレスは必須項目です。正しくご記入ください。\n";
		error+=1;	
	}

	if(document.getElementById("text").value==""){
		mes+="お問い合わせは必須入力です。";
		error+=1;	
	}
	

	
	if(error>0){
		window.alert(mes);
		return false;
	}

}

function validate_register(){
	
	var mes=[];
	var error=[];

	
	if(document.getElementById("name").value==""){
		mes+="氏名は必須項目です。10文字以内でご記入ください。\n";
		error+=1;
	}else if(document.getElementById("name").value.length>10){
		mes+="氏名は必須項目です。10文字以内でご記入ください。\n";
		error+=1;	
	}
		
	if(document.getElementById("email").value==""){
		mes+="メールアドレスは必須項目です。\n";
		error+=1;
	}else if(!document.getElementById("email").value.match(/^[A-Za-z0-9]+[A-Za-z0-9\._-]*@[a-zA-Z0-9_-]+[a-zA-Z0-9\._-]+$/)){
		mes+="メールアドレスは必須項目です。正しくご記入ください。\n";
		error+=1;	
	}
	
	if(document.getElementById("password").value!=document.getElementById("password_conf").value){
			mes+="入力されたパスワードが一致しません。正しくご記入ください。\n";	
			error+=1;
	}else if(document.getElementById("password").value==""){
		mes+="パスワードは必須項目です。\n";
		error+=1;
	}else if(document.getElementById("password_conf").value==""){
		mes+="パスワードの確認は必須項目です。\n";
		error+=1;
	}
	
	if(document.getElementById("user_name").value==""){
		mes+="ユーザーネームは必須項目です。\n";
		error+=1;
	}


	

	
	if(error>0){
		window.alert(mes);
		return false;
	}

}




</script>
<script type="text/javascript">
 $(document).ready(function(){
   
  //エンター制御はお好みで
    $("#form").keypress(function(ev) {
      if ((ev.which && ev.which === 13) || (ev.keyCode && ev.keyCode === 13)) {
        return false;
      }
    });
   
    $(document).on('blur','#email',function(e){ 
      
        $.ajax({
           type:"POST",
           url:"ajax_email.php",
           data:{
					email:$('[name="email"]').val(),
              		password : $('[name="password"]').val(),
				},
            success: function (data, textStatus, xhr) {
              if(data[0].count == 0){
                $("#message").html('使用出来ます').css({"color":"blue"});
              }else{
                $("#message").html('使用出来ません').css({"color":"red"});
              }
            }
        });
    }); 
 });
</script>

</head>

<body>
	<header>
    	<div id="logo">
        	<a href="/">
            	<img src="img/top_logo_03.png" id="h_logo">
                <img src="img/res_icon.png" id="res">
            </a>
        </div>
        
    	<div id="search_box">
        	<form action="search.php" method="post">
            	<p>記事検索：<input type="text" id="search_word" name="search_word"><button type="submit" id="sbtn"><span class="material-icons">search</span></button></p>
            </form>
        </div>

        
        <div id="right_header">
        	<ul>
            	<li><a href="register.php">新規登録</a></li>
                <li><a href="login.php">ログイン</a></li>
            </ul>
        </div>
    </header>
