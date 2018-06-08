<?

session_start();
//Вся инфа по всем помещениям для ховера
$result = $db->prepare("SELECT buld, sec, number, numb_of_floors, total_area, floor_area, id FROM `apartments_commerc`");
//$floor = 1;
//$result->bind_param(i, $floor);
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

//echo"<pre>"; print_r($info);echo"/<pre>";

?>

<? /*head*/ HeadAdd($html=['head'=>'Y', 'html'=>'<link rel="stylesheet" href="/css/appart.css">
<link rel="stylesheet" href="/css/flattype.css">']);	?>

    <div class="main_page clearfix">
           <?  /*Menu*/ MenuAdd();  ?>

      <div class="content content_floorplan content_commerc">
        <div class="content_wrap clearfix">
          <div class="content_name"><h1><?H1page()?></h1></div>
          <div class="content_text">
            Київ - мегаполіс, що активно розвивається. Незмінним попитом користується комерційна нерухомість, яка розташована на перших поверхах новобудов. Новий житловий комплекс SAN FRANCISCO Creative House в Шевченківському районі столиці служить символом нової для України концепції життя, і цю цінність ми розділяємо із усіма власниками торгової нерухомості у будинку.

          </div>

				  <div class="floor_choice commercial_top">

            <div class="main_svg">
            <!--Import svg image-->
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/img/commercial/plan2/index.php'); ?>
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

            <div class="commercial__turn-view">
              <a class="turn" href="<?=$url_link_shlashbefore;?>/commercial2/"><img src="/img/pin/180.svg" width="70px" height="70px" alt="turn"></a>
              <div class="position content_text">
                <?=$mes['plan-mes2']?>
              </div>
            </div>
            
            <!-- Form starts here -->
            <div class="commercial_botom">
              <div class="form_submitions">
                <div class="form_submitions__number content_name"><?= $amount; ?></div>
                <div class="content_text"><?=$mes['com-mes6']?></div>
              </div>
              <div class="commercial_form_wraper">
                <div class="commercial_form">
                  <div class="content_name"><?=$mes['callback-mes1']?></div>
                  <div class="content_text"><?=$mes['com-mes8']?></div>
                  <form action="" method="POST">
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
              </div>
            </div> <!-- Form ends here -->

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
<? /*footer*/ FooterAdd($html=['head'=>'Y']);		?>
