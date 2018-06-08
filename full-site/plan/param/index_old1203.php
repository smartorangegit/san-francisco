<?include_once($_SERVER['DOCUMENT_ROOT'].'/includes/pages/param.php');?>

<?/*head*/ HeadAdd( $html=['head'=>'Y', 'robots'=>'index, follow', 'title'=>$mes['param-title'],'description'=>$mes['param-description'],'html'=>'
     <link rel="stylesheet" href="/css/appart.css">
    <link rel="stylesheet" type="text/css" href="/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="/css/ion.rangeSlider.skinHTML5.css">']);	?>
	    <div class="main_page clearfix">
           <?  /*Menu*/ MenuAdd();  ?>
      <div class="content tablet_page content_param">
        <div class="content_wrap clearfix">
          <div class="content_name"><h1><?H1page()?></h1></div>


          <div class="param_container1">
            <div class="param_container clearfix">
							<a class="close" href="javascript:history.go(-1)" mce_href="javascript:history.go(-1)"><img src="/img/close.svg" alt="close" width="40px"></a>
              <div class="range_box">

	<?	foreach($sort as $key=>$t){?>
	 <span><h2><?=$mes['par-mes-'.$t]?></h2></span>
	 <input type="text" id="<?=$t?>"  value="" />
	 <input type="hidden" id="<?=$t?>_min_max" value="<?echo $Rest[$t]['min'].'/'.$Rest[$t]['max']?>"/>
		<?}?>
              </div>
              <div class="results_box">
								<img class="loader" src="/img/bx_loader.gif" alt="Loading...">
                <table class="table_fixed">
									<thead>
								   <tr>
	                  <th><?=$mes['par-mes1']?></th>
	                  <th><?=$mes['par-mes-floor']?></th>
	                  <th>№</th>
	                  <th><?=$mes['par-mes2']?></th>
	                  <th><?=$mes['par-mes-area']?></th>
	                 </tr>
								 </thead>
							 </table>
								 <table class="table_scroll">

				 <?
				 foreach($REZULT as $key=>$s){
					 $url="$url_link_shlashbefore/plan{$s['buld']}/sections{$s['sec']}/floor{$s['floor']}/flat{$s['number']}_{$s['id']}/"; ?>
					 <a href="<?=$url?>">
					 <tr
							onclick='document.location.href = "<?=$url?>";'
							class="sort"
							data-floor='<?=$s['floor']?>'
							data-area='<?=$s['all_room']?>'
							data-room='<?=$s['kim']?>'
							style='' >
							<td><?=$s['buld']?></td>
							<td><?=$s['floor']?></td>
							<td><?=$s['number']?></td>
							<td><?=$s['kim']?></td>
							<td><?=$s['all_room']?></td>
					 </tr>
					 </a>
				<? } ?>
                </table>
								<div class="js-no-results no-results no-results_hidden">
									<p><?=$mes['par-mes4']?></p>
									<a class="button reset_button" id="reset"><?=$mes['par-mes5']?></a>
									<p><?=$mes['par-mes6']?></p>
									<a class="wowoo-link" href="#"><div class="tel">+38 (044) 223-59-89</div></a>
								</div>
              </div>
							<div>
							</div>
            </div>
          </div>
        </div>
      </div>
    </div>
<? /*footer*/ FooterAdd($html=['html'=>'<script src="/js/ion.rangeSlider.js"></script><script src="/js/range.js"></script>', 'head'=>'Y']);	?>
