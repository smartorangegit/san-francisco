<?

session_start();
//Вся инфа по всем помещениям для ховера
$result = $db->prepare("SELECT buld, sec, number, numb_of_floors, total_area, floor_area, id FROM `apartments_commerc`");
$floor = 1;
$result->bind_param(i, $floor);
$result->execute();
$result->store_result();
$result->bind_result($data['buld'], $data['sec'], $data['number'], $data['number_of_foors'], $data['total_area'], $data['floor_area'], $data['id']);

while ($result->fetch()) {
  $info['buld'][] = $data['buld'];
  $info['section'][] = $data['sec'];
  $info['number'][] = $data['number'];
  $info['number_of_floors'][] = $data['number_of_foors'];
  $info['total_area'][] = $data['total_area'];
  $info['floor_area'][] = $data['floor_area'];
  $info['class_name'][] = 'area_number_'. $data['id'];
  $info['id'][] = $data['id'];
  $info['url'][] = UrlAdd('commercial/premise' . $data['id'] . '_' . $data['sec'], 1);
}
$result->close();

foreach($info as $key=>$value) {
  if($key == 'id' OR $key == 'class_name' OR $key == 'url') {
    $_SESSION['info'][$key] = $value;
  }
}

//Количество отправленных заявок по коммерческой
$result = $db->prepare('SELECT COUNT(id) FROM `calls` WHERE typs = ?');
$type = 3;
$result->bind_param(i, $type);
$result->execute();
$result->store_result();
$result->bind_result($amount);
$result->fetch();
$result->close();

?>

<? /*head*/ HeadAdd($html=['head'=>'Y', 'html'=>'<link rel="stylesheet" href="/css/appart.css">
<link rel="stylesheet" href="/css/flattype.css">']);	?>

    <div class="main_page clearfix">
           <?  /*Menu*/ MenuAdd();  ?>

      <div class="content content_floorplan content_commerc">
        <div class="content_wrap clearfix">
          <div class="content_name"><h1><?=$mes['commercial-h1']?></h1></div>
          <div class="content_text">
            <?=$mes['com-mes11']?>
          </div>

				  <div class="floor_choice commercial_top">

            <div class="main_svg">
            <!--Import svg image-->
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/img/commercial/plan1/index.php'); ?>
            </div>
            <div class="main_data">
              <div id="data">
                <div class="info_section">
                  <span class="number" id="building">-</span>
                  <span class="name"><?=$mes['com-mes1']?></span>
                </div>
                <div class="info_section" id="section_section">
                  <span class="number" id="section">-</span>
                  <span class="name"><?=$mes['com-mes2']?></span>
                </div>
                <div class="info_section">
                  <span class="number" id="number_of_floors">-</span>
                  <span class="name"><?=$mes['com-mes3']?></span>
                </div>
                <div class="info_section">
                  <span class="number" id="number">-</span>
                  <span class="name"><?=$mes['com-mes4']?></span>
                </div>
                <div class="info_section">
                  <span class="number" id="total_area">-</span>
                  <span class="name"><?=$mes['com-mes5']?></span>
                </div>
                </div>
            </div> <!--main_data ends here-->

            <!-- Form starts here -->
            <div class="commercial_botom">
              <!-- <div class="form_submitions">
                <div class="form_submitions__number content_name"><?= $amount; ?></div>
                <div class="content_text"><?=$mes['com-mes6']?></div>
              </div> -->
              <!-- <div class="commercial_form_wraper"> -->
                <div class="commercial_form  horizontal__form">
                  <div class="content_name"><?=$mes['callback-mes1']?></div>
                  <div class="content_text"><?=$mes['com-mes8']?></div>
                  <form class="horizontal" action="" method="POST">
                    <div class="input">
                      <input type="text" name="name" value="" placeholder="<?=$mes['callback-mes3']?>" id="callbackName">
                    </div>
                    <div class="input">
                      <input type="tel" class='inputtelmask' name="tel" value="" placeholder="<?=$mes['callback-mes4']?>" id="callbackTel">
                    </div>
                    <div class="input">
                      <input type="email" name="email" value="" placeholder="E-MAIL" id="callbackEmail">
                    </div>
                    <input  name="webad" class="webad" type="hidden" value="http://san.smarto.com.ua/commercial"/>
                    <input  name="metka" class="metka" type="hidden" value="San-francisco with text"/>
                    <input  name="inn" class="userInn" type="hidden" value="San-francisco"/>
                    <input type="hidden" name="typ" value="3">
                    <div class="input">
                      <input class="button" type="submit" name="" value="<?=$mes['callback-mes5']?>">
                    </div>
                  </form>
                </div>
              <!-- </div> -->
            </div> <!-- Form ends here -->

            <style media="screen">
              .horizontal__form{
                width: 100%;
              }
              form.horizontal{
                display: flex;
                display: -webkit-flex;
                align-items: center;
                -webkit-align-items: center;

              }
              form.horizontal .input{
                width: 25%;
                display: block;
                padding: 6px;
                box-sizing: border-box;
              }
              form.horizontal .intl-tel-input{
                width: 100%;
              }
              form.horizontal input{
                width: 100%;

              }
            </style>

          </div> <!-- Floor choise ends here -->

		<script>
    // document.getElementById("data").style = "display:none";
    <? foreach($info['class_name'] as $key=>$value) { ?>
			$('.<?= $value ?>').mouseover(function() {
        document.getElementById("building").innerHTML = "<?=$info['buld'][$key]?>";
        <? /* У некоторых помнещений нет секций */ ?>
        <? if($info['section'][$key] == NULL): ?>
          document.getElementById("section").innerHTML = "-";
          // $('#section_section').css({'display': 'none'});
        <? else: ?>
          // $('#section_section').css({'display': 'block'});
          document.getElementById("section").innerHTML = "<?=$info['section'][$key]?>";
        <? endif; ?>
			  document.getElementById("number_of_floors").innerHTML = "<?=$info['number_of_floors'][$key]?>";
        document.getElementById("number").innerHTML = "<?=$info['number'][$key]?>";
        document.getElementById("total_area").innerHTML = "<?=$info['total_area'][$key]?>" + " м2";
        // document.getElementById("floor_area").innerHTML = "<?=$info['floor_area'][$key]?>" + " м2";
			  // document.getElementById("data").style = "display:block";

			}).mouseout(function()
			{
			// document.getElementById("data").style = "display:none";
			});
    <? } ?>
		</script>

          </div>
          <div class="bottom_form_plan"><a id="callform1" class="button callback"  href="#">замовити дзвінок</a></div>
        </div>
      </div>

    </div>
	<!-- <style>

    .content_commerc .content_name{
      width: 100%;
      float: none;
      margin-bottom: 10px;
    }
    .content_commerc .content_text{
      margin: 15px auto;
    }
    .main_svg {
      display: inline-block;
      width: 78%;
    }
    .main_data {
      display: inline-block;
      width: 20%;
      vertical-align: top;
      text-align: center;
    }

    /*Commercial Form Start*/
    .commercial_form {
      display: block;
      position: static;
      height: auto;
      width: 320px;
      margin: 0 auto;
      background-color: transparent;
      text-align: center;
    }

    .commercial_botom input {
      display: block;
      margin: 12px auto;
      background-color: transparent;
      outline: none;
      width: 320px;
      height: 40px;
      font-family: "AkzidenzGroteskPro-LightCn";
      font-size: 16px;
      border: 1px solid #ffffff;
      transition: 0.3s;
      -webkit-transition: 0.3s;
      padding: 0 0 0 20px;
      box-sizing: border-box;
      color: white;
    }

    .commercial_botom input::-webkit-input-placeholder {
      color: #ffffff;
    }
    .commercial_botom input::-moz-placeholder {
      color: #ffffff;
    }
    .commercial_botom input:-ms-input-placeholder {
      color: #ffffff;
    }
    .commercial_botom input:-moz-placeholder {
      color: #ffffff;
    }

    .commercial_botom .content_text {
      color: white;
    }

    .commercial_form_wraper {
      display: inline-block;
      width: 68%;
    }
    .form_submitions {
      display: inline-block;
      width: 30%;
      vertical-align: top;
      text-align: center;
    }

    .commercial_botom .content_text {
      padding: 10px 0px;
      text-align: center;
    }

    .content.content_floorplan .commercial_botom .content_name {
      text-align: center;
      width: auto;
    }

		@media only screen and (max-width: 768px) {
      .content.content_commerc{
        height: auto;
      }
			.main_svg {
        width: 100%;
      }
      .main_data {
        width: 100%;
      }
      .form_submitions {
        width: 100%;
      }
      .commercial_form_wraper {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
      }
      .commercial_form{
        width: 100%;
      }
      .intl-tel-input{
        display: block;
        margin: 0 auto;
      }
      .commercial_botom input {
        width: 100%;
      }
      .content_commerc .bottom_form_plan{
        margin: 0 auto;
      }
      .content_commerc .bottom_form_plan .button{
        padding: 10px 40px;
      }
		}
	</style> -->
<? /*footer*/ FooterAdd($html=['head'=>'Y']);		?>
