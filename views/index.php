<?php 
session_start(); 

if(isset($_SESSION["user_email"])){
	$user=$_SESSION["user_email"];
	$user_id=$_SESSION["user_id"];
}

?>

<?php require_once("header.php"); ?>    
    <main>
            
        <div id="main_photo">
        	<div class="wid12">
                <img src="img/top_main.png" class="pc">
                <img src="img/res_main.png" class="sp">
            </div>
        </div>
        
        <section id="about_site" class="background">
        	<div class="main_sec wid12">
                <h1 class="center">- 当サイトについて -</h1>
                <p>当サイトはJリーグに関する試合、チーム、選手に対して誰でも口コミが可能なサイトです。自由な発言、発信を守ります。試合中でのマニアックなプレーの共有であったり 、各々の今の注目選手であったり、たくさんの情報が発信可能でたくさんの情報収集も可能なJリーグに特化したネット上でのスタジアムです。</p>
                <p id="red_b">あなたの発信、発言が１３人目のJリーガーだ！</p>
            </div>
        </section>
        
        <section class="background_white">    
            <div class="main_sec" class="wid12">
            	<h2 class="center">- 口コミの投稿方法 -</h2>
                <p class="center">自由な発言、発信を守ります。まずは会員登録へ！</p>
                <div class="btn_reg"><a href="register.php">新規登録</a></div>
                <div id="btn_con"><a href="contact.php">お問い合わせはこちらへ</a></div>
                <div id="btn_log"><a href="login.php">ログイン</a></div>
            </div>
        </section>
            
        
        <section class="background">
			<h2 align="center" class="margin">- レビュー一覧 -</h2>
		<?php 
			require_once(ROOT_PATH .'Controllers/jleague_controller.php');

			$post_display=new jleague_controller();
			$params=$post_display->post_display();
		?>
<div class="center_posi">        
<?php foreach($params['post_display'] as $line): ?>
	<table><tr><td><a href="review_page.php?p_id=<?php echo $line['article_id']; ?>"><?php echo $line['article_name']; ?></a></td></tr></table>
<?php endforeach; ?>
</div>
        </section>
<?php if(isset($user_id)):?>
   <div class="btn_reg"><p><a href="mypage.php?u_id=<?php echo $user_id; ?>">マイページへ</a></p></div>
   <div class="btn_reg"><p><a href="logout.php">ログアウト</a></p></div>
<?php endif; ?>
    </main>
    
<?php require_once("footer.php"); ?> 

