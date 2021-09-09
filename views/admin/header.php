<?php 

if(!isset($_SESSION)){
session_start();
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>J13 13人目のJリーガー 管理画面</title>
<link href="/css/index.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript" src="/js/tinymce/jquery.tinymce.min.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode :"exact",
	elements :"elm1",
	theme :"modern",
	language: "ja",
	// WYSIWYGエディタに適用する CSSファイルを指定する
	content_css : "/css/editor.css",
	body_class: "tiny_mce_class",
	width: 850,
	height: 450,
	init_instance_callback : "tinymceInit",
	theme_modern_toolbar_location : "top",
	theme_modern_toolbar_align : "left",
	theme_modern_statusbar_location : "bottom",
	theme_modern_resizing : true,
	extended_valid_elements : "div[*]",
	extended_valid_elements : "script[*]",
	extended_valid_elements : "iframe[*]",
	extended_valid_elements : "span[*]",
	image_advtab: true,
	external_filemanager_path:"/filemanager/",
	filemanager_title:"ファイルマネージャー",
	external_plugins: { "filemanager" : "/filemanager/plugin.min.js"},

		plugins: [
			"autolink link image lists charmap print preview hr anchor",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime jbimages media nonbreaking",
			"table contextmenu directionality template paste textcolor"
],
		menu: {
		},

		toolbar: ["code preview | undo redo | cut copy paste | link unlink | alignleft aligncenter alignright | bullist numlist outdent indent | jbimages media responsivefilemanager | fullscreen",
		"bold italic underline strikethrough forecolor backcolor removeformat | styleselect code_tag | code_tag5 code_tag4 code_tag6 code_tag7 code_tag8 code_tag9 code_tag10 code_tag11 code_tag12 code_tag13 code_tag2"
		], 

		style_formats: [
			{title: '見出し', items:[
				{title: 'H2', block: 'h2', exact:true},
				{title: 'H3', block: 'h3', exact:true},
				{title: 'H4', block: 'h4', exact:true},
			]},
			{title: '文字サイズ', items:[
				{title: '16px', inline: 'span', classes: 'p16p'},
				{title: '18px', inline: 'span', classes: 'p18p'},
				{title: '20px', inline: 'span', classes: 'p20p'},
				{title: '24px', inline: 'span', classes: 'p24p'},
				{title: '32px', inline: 'span', classes: 'p32p'},
				{title: '48px', inline: 'span', classes: 'bigs'},
			]},
		],

		theme_advanced_buttons3:'code_tag',
		relative_urls : false, // 相対パスに変換されるのを防ぐ

});

	function tinymceInit(){
	}

</script>

</head>

<body>
	<header>
    	<div id="logo">
        	<a href="/index.php">
            	<img src="/img/top_logo_03.png" id="h_logo">
                <img src="/img/res_icon.png" id="res">
            </a>
        </div>
        
        
        <div id="right_header">
        	<ul>
                <li><a href="logout.php">ログアウト</a></li>
            </ul>
        </div>

        
    </header>
