<?php  /*All function*/ require_once('function.php');  
$offset= is_numeric($_POST['offset']) ? $_POST['offset'] : die();
$postnumbers  = is_numeric($_POST['number']) ? $_POST['number'] : die();

if ($offset) {
$ReaNews =LoadingNews($postnumbers, $offset);
  
    	foreach($ReaNews['ReaNews'] as $key=>$s):?>
            <figure class="effect-oscar">
              <img src="<?=$s['img-min']?>" alt="<?=$s['name_news']?>" />
              <figcaption>
                <div class="news_date"><?=$s['date']?></div>
                <div class="fig_wrap">
                  <h2 class="content_subname" style="color:white;"><?=$s['name_news']?></h2>
                  <p class="content_text"><?=$s['mini_text']?></p>
                </div>
                <a class="news" href="<?UrlAdd($s["urls"])?>"  > </a>

              </figcaption>
            </figure>
		<?
		endforeach;
}
?>	
			