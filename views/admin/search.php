<?php 

require_once(ROOT_PATH .'Controllers/jleague_controller.php');

$search=new jleague_controller();
$params=$search->search();

require_once("header.php");

	


?>
<main>

    <div id="main_photo">
        <div class="wid12">
            <img src="/img/top_main.png">
        </div>
    </div>
      
    
    
    <h2 align="center" class="margin">- 検索結果 -</h2>
    
    <section class="background">
        <div class="center_posi">
            <?php foreach($params["search"] as $word): ?>
                <table><tr><td><a href="review_page.php?p_id=<?php echo $word['article_id']; ?>"><?php echo $word["article_name"]; ?></a></td></tr></table>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php require_once("footer.php"); ?>



