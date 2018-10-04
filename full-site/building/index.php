<?php
if($_POST['lang']==''){$lg='ua';}else{$lg=substr($_POST['lang'], 0,2);}
$result = $db->prepare("SELECT date, hod_name_$lg, hod_full_$lg, path,ar_imgs, sumb_cod
	FROM hod_stroy WHERE isActive=0 ORDER BY date DESC");
	$result->execute();
	$result->bind_result($s['date'],$s['name'],$s['text'],$s['img-url'],$s['ar_imgs'],$s['sumb_cod']);

	 while ($result->fetch()) {

			$date = new DateTime($s['date']);

		$s['date']=$date->format('d.m.Y');
		$s['imgs']=explode('*/*', $s['ar_imgs']);

		 foreach($s as $key=>$k){			$rez[$key]=$k;	}

	$ReaPost[]=$rez;
	 }



	$result = $db->query("SELECT * FROM pers");
	 while ($row = $result->fetch_assoc()) {

		$PERC=$row;

	 }
	 for ($i=1; $i<=4; $i++){

	 $PERC['perOpis_'.$i]=explode('/',   $PERC['perOpis_'.$i]);

	 }
	 $i=1;

	 //$PERC->perOpis_1=explode('/',   $PERC->perOpis_[1]);

	 // echo '<pre>'; print_r($row); echo '</pre>';
	 /*
	$result = $db->query("SELECT * FROM hod_stroy WHERE isActive=0 ORDER BY date DESC");
 while ($row = $result->fetch_object()) {


	 echo '<pre>'; print_r( $row); echo '</pre>';
 }
	*/
//echo '<pre>'; print_r($ReaPost); echo '</pre>';

?>

<? /*head*/ HeadAdd( $html=['head'=>'Y',
							'html'=>'<link rel="stylesheet" href="/css/building.css">
							<link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css">']);	?>

    <div class="main_page tablet_page clearfix">
          <?  /*Menu*/ MenuAdd();  ?>

      <div class="content long_page content_building">
        <div class="content_wrap clearfix">
					<div class="status_wrap clearfix">
						<div id="buidling_status" class="content_name"><?=$mes['bul-mes1'];?></div>
						<div class="status_content">
							<div class="content_subname"><?=$mes['bul-mes26'];?></div>
							<div class="content_text"><?=$mes['bul-mes25']?></div>
							<div class="status_progress clearfix">
								<div class="status_progress_name">
									<ul>
										<li class="content_text"><?=$mes['bul-mes9'];?></li>
										<li class="content_text"><?=$mes['bul-mes10'];?></li>
										<li class="content_text"><?=$mes['bul-mes11'];?></li>
										<li class="content_text"><?=$mes['bul-mes12'];?></li>
									</ul>
								</div>
								<div class="status_timebar">
									<ul>
										<li><span class="tooltip toolti p-effect-1"><span class="tooltip-item"><svg class="button" data-p="<?=$PERC['persent_1']?>" id="container0"></svg></span>
											<span class="tooltip-content clearfix"><span class="tooltip-text"><?=$mes['bul-mes13'];?> <?=$PERC['perOpis_1'][0]?>%<br><?=$mes['bul-mes14'];?> - <?=$PERC['perOpis_1'][1]?>%<br><?=$mes['bul-mes15'];?> - <?=$PERC['perOpis_1'][2]?>%<br><?=$mes['bul-mes16'];?> - <?=$PERC['perOpis_1'][3]?>%</span></span></span></li>
										<li><span class="tooltip toolti p-effect-1"><span class="tooltip-item"><svg class="button" data-p="<?=$PERC['persent_2']?>" id="container1"></svg></span><span class="tooltip-content clearfix"><span class="tooltip-text"><?=$mes['bul-mes17'];?> - <?=$PERC['perOpis_2'][0]?>%<br><?=$mes['bul-mes18'];?> - <?=$PERC['perOpis_2'][1]?>%</span></span></span></li>
										<li><span class="tooltip toolti p-effect-1"><span class="tooltip-item"><svg class="button" data-p="<?=$PERC['persent_3']?>" id="container2"></svg></span><span class="tooltip-content clearfix"><span class="tooltip-text"><?=$mes['bul-mes19'];?> - <?=$PERC['perOpis_3'][0]?>%<br><?=$mes['bul-mes20'];?> - <?=$PERC['perOpis_3'][1]?>%</span></span></span></li>
										<li><span class="tooltip toolti p-effect-1"><span class="tooltip-item"><svg class="button" data-p="<?=$PERC['persent_4']?>" id="container3"></svg></span><span class="tooltip-content clearfix"><span class="tooltip-text"><?=$mes['bul-mes19'];?> - <?=$PERC['perOpis_4'][0]?>%<br><?=$mes['bul-mes20'];?> - <?=$PERC['perOpis_4'][1]?>%</span></span></span></li>
									</ul>
								</div>
								<div class="status_buttons">
									<ul>
										<li><a class="button" href="#building_process"><?=$mes['bul-mes21'];?></a></li>
										<li><a class="button" href="/webcam/"><?=$mes['bul-mes22'];?></a></li>
										<!-- <li class="content_text"><?=$mes['bul-mes24'];?></li>
										<li class="content_text"><?=$mes['bul-mes25'];?></li> -->
									</ul>
								</div>
							</div>
							<div class="building_text_1">
		            <div class="content_subname"><?=$mes['bul-mes1']?></div>
		            <div class="content_text"><?=$mes['bul-mes3']?></div>
		          </div>

						</div>

						<div class="status_picture clearfix">
							<div class="status_img">
								<img  <?LazyLoad ("/img/house.png", array("class"=>"house_status"))?> alt="house">
								<img <?LazyLoad ("/img/house_full.png", array("class"=>"house_full"))?> alt="house" style="clip-path: inset(63% 0 0 0); -webkit-clip-path: inset(90% 0 0 0);">
							</div>
							<!--<div class="status_level">
								<div class="content_subname">5</div>
								<div class="content_text">поверхів <br>побудовано</div>
							</div>-->
						</div>
					</div>


          <div id="building_process" class="content_name"><h1><?=$mes['building-h1']?></h1></div>
          <!-- <div class="building_text_1">
            <div class="content_subname"><?=$mes['bul-mes1']?></div>
            <div class="content_text"><?=$mes['bul-mes3']?></div>
          </div> -->
          <!-- <div class="building_text_2">
            <div class="content_subname"><?=$mes['bul-mes2']?></div>
            <div class="content_text"><?=$mes['bul-mes4']?></div>
          </div> -->

          <div class="photo-box clearfix">
						<? foreach ($ReaPost as $t) { ?>
							<figure class="effect-oscar">
		              <img  <?LazyLoad ($t['img-url'].'/'.$t['imgs'][0])?> alt="build1"/>
		              <figcaption>
		                <div class="build_date"><?=$t['date']?></div>
		                <div class="fig_wrap">
		                  <div class="content_subname" style="color:white;"><?=$t['name']?></div>
		                  <p class="content_text"><?=$t['text']?></p>
		                </div>
										<? foreach ($t['imgs'] as $tt) {
											echo '<a class="build fancybox" href="'.$t['img-url'].'/'.$tt.'" data-fancybox="'.$t['sumb_cod'].'" data-options="" data-caption="'.$t['text'].' '.$t['date'].'"></a>';
		      				}?>
							</figcaption>
            </figure>
						<?
						}
						?>
          </div>
					<? include_once('includes/static_form.php'); ?>
        </div>
				<?/*copyring*/copyringAdd();?>
      </div>
    </div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script> -->
		<script type="text/javascript">
		$(".fancybox").fancybox({
			arrows : true,
			buttons: [
				"slideShow",
				"fullScreen",
				"thumbs",
				"close"
			],
			thumbs : {
				autoStart: true
			},
			animationEffect: "zoom-in-out"
		});

		</script>

		<style media="screen">
		.tooltip {display: inline-block;position: relative;z-index: 999;cursor: pointer;}
		/* Gap filler */
		.tooltip::after {content: '';position: absolute;width: 100%;height: 20px;bottom: 100%;	left: 50%;	pointer-events: none;	-webkit-transform: translateX(-50%);	transform: translateX(-50%);}
		.tooltip:hover::after {	pointer-events: auto;}
		/* Tooltip */
		.tooltip-content {position: absolute;z-index: 9999;width: 240px;left: 50%;bottom: 100%;font-size: 14px;line-height: 1.4;text-align: center;font-weight: 400;color: #fffaf0;background: #2c2829;opacity: 0;border-top: 3px solid #EF4136;margin: 0 0 20px -120px;cursor: default;pointer-events: none;font-family: "StTransmission-300Light";-webkit-font-smoothing: antialiased;-webkit-transition: opacity 0.3s 0.3s;transition: opacity 0.3s 0.3s;}
		.tooltip:hover .tooltip-content {	opacity: 1;	pointer-events: auto;	-webkit-transition-delay: 0s;	transition-delay: 0s;}
		.tooltip-content span {	display: block;}
		.tooltip-text {	border-bottom: 10px solid #EF4136;	overflow: hidden;	-webkit-transform: scale3d(0,1,1);	transform: scale3d(0,1,1);	-webkit-transition: -webkit-transform 0.3s 0.3s;	transition: transform 0.3s 0.3s;}
		.tooltip:hover .tooltip-text {	-webkit-transition-delay: 0s;	transition-delay: 0s;	-webkit-transform: scale3d(1,1,1);	transform: scale3d(1,1,1);}
		.tooltip-inner {	background: rgba(85,61,61,0.95);	padding: 40px;	-webkit-transform: translate3d(0,100%,0);	transform: translate3d(0,100%,0);	webkit-transition: -webkit-transform 0.3s;	transition: transform 0.3s;}
		.tooltip:hover .tooltip-inner {	-webkit-transition-delay: 0.3s;	transition-delay: 0.3s;	-webkit-transform: translate3d(0,0,0);	transform: translate3d(0,0,0);}
		/* Arrow */
		.tooltip-content::after {	content: '';	bottom: -20px;	left: 50%;	border: solid transparent;	height: 0;	width: 0;	position: absolute;	pointer-events: none;	border-color: transparent;	border-top-color: #EF4136;	border-width: 10px;	margin-left: -10px;	visibility: visible;}
		</style>

<? /*footer*/ FooterAdd($html=['head'=>'Y',
							   'html'=>'

								  <script src="/js/jquery.progress.js"></script> <script src="/js/status.js"></script> ']);?>
