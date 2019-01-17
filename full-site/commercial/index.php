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
<!-- код комерції -->
<? $lang = '/'.$url_link_slashafter;
if ($lang == '/ru/') {$lneg_url = 'ru';}else {$lneg_url = 'uk';}
?>
<div id="fs-commerce"></div>
<script src = "https://hammerjs.github.io/dist/hammer.js?v=1.0.0"> </script>
<script src = "https://commerce.flat.show/src/js/init.js"> </script>
<script>
var flatShowLang = '<?= $lneg_url ?>';
var fsl = new FSLoader (
[
'https://commerce.flat.show/src/css/fsc.css'
],
[
"https://commerce.flat.show/messages/<?= $lneg_url ?>.js",
"https://commerce.flat.show/san-francisco/config.js",
"https://commerce.flat.show/src/js/fsc.js",
"https://commerce.flat.show/san-francisco/custom.js"
], function () {
calcViewPort ();
});
</script>


<style>
.desktop.show__floorplan-view #fsc-controls #floor-select--wrapper,
.desktop.show__floorplan-view  .top-border {
   display: none;
   }
   #fs-commerce * {
    font-family: "StTransmission-300Light";
}
</style>
<!-- конец код комерції -->
      <div class="content_wrap clearfix">


            <!-- Form starts here -->
            <div class="commercial_botom">
            </div> <!-- Form ends here -->


<!-- <div class="param__text">
  <?/* =$mes['commercial-seo'] */?>
</div> -->
            <style media="screen">
            .content_floorplan .content_wrap {
              height: 0;
              padding: 0;
            }
            .param__text h1{
              font-size: 28px;
            }
            .param__text h2{
              font-size: 24px;
            }

            .param__text{
              font-family: "StTransmission-300Light";
              line-height: 1.6;
            }
            .param__text p, .param__text li{
              line-height: 1.6;
              margin: 10px 0;
              }
            .param__text li{
              line-height: 1.6;
              }
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
			  .content_floorplan .content_wrap {
				  height:auto;
			  }
			  @media only screen and (max-width: 768px){
				.bottom_form_plan {
					display:none;
				}
      }
            </style>
 <!-- end of the old text -->



<div class="info-popup" id="info-popup" style="display: none; top: 10%; opacity: 0;">
  <svg class="svg_close" onclick="(function(close){
    $('.overlay').fadeOut(300);
    $('.info-popup').css('display','none').animate({opacity: 0, top: '10%'}, 200);
  })(this)"id="info-popup_close" enable-background="new 0 0 50 50" viewBox="0 0 50 50" width="40" xmlns="http://www.w3.org/2000/svg"><path d="m37.304 11.282 1.414 1.414-26.022 26.02-1.414-1.413z" fill="#ef4136"></path><path d="m12.696 11.282 26.022 26.02-1.414 1.415-26.022-26.02z" fill="#f9322e"></path></svg>
  <div>
    <?php if($lneg_url = 'uk') { ?>
<h1>КОМЕРЦІЙНА НЕРУХОМІСТЬ</h1>
<p>При будівництві SAN FRANCISCO Creative House ми врахували запити не
тільки майбутніх мешканців, але й власників бізнесу, та заздалегідь
спроектували приміщення для магазинів, кафе, ресторанів. Перші два
поверхи будинку займає нежитлова нерухомість площею від 60 м² до 550
м² – це ідеальні варіанти як для малого, так і для середнього та великого
бізнесу. Крім цього, ми ґрунтовно підійшли до будівництва офісних
приміщень і відвели вісім поверхів житлового комплексу для компаній, що
працюють в різних сегментах підприємницької діяльності.
ЖК Сан-Франциско – це оптимальна локація для роботи юридичної
компанії, дизайнерського шоу-руму або концептуальної кав&#39;ярні. Зручне
розташування – 5 хвилин до метро та парку Нивки, в 150 метрах від
будинку знаходяться зупинки наземного транспорту, також є можливість
під&#39;їхати до будинку на автівці – особливості, на які ви точно звернете
увагу при детальному знайомстві з житловим комплексом. Але головне,
обираючи SAN FRANCISCO Creative House для комерційної нерухомості,
є можливість бути ближче до своєї цільової аудиторії. З огляду на
інфраструктуру району Києва, ваша діяльність точно буде користуватися
попитом.</p>
 <h2>1. Ресторани та кафе в SAN FRANCISCO Creative House</h2>
<p>Перші два поверхи будинку ми відводимо для закладів громадського
харчування. Ми заздалегідь поділяємо нежитлову нерухомість за
призначенням, облаштовуючи кожне комерційне приміщення з
урахуванням його функціональних особливостей. Для ресторанів та кафе
встановлюємо вентиляційні виходи, враховуємо кількість
енергоспоживання, а також передбачаємо безбар&#39;єрний вхід, який показує
позитивну динаміку на відвідуваність клієнтів. Великі панорамні вікна
забезпечують хорошу оглядовість – ще одна якість, важлива для подібних
закладів.</p>
 <h2>2. Торговельні приміщення </h2>
<p>Магазин поряд з будинком – ключова складова його інфраструктури.
Збираючись за покупками, мешканці завжди віддають перевагу пішим
прогулянкам, а ніж поїздкам на автомобілі чи на громадському транспорті.
А якщо бутік або супермаркет розташовані безпосередньо в житловому
комплексі, це створює додаткову перевагу його власнику. У ЖК Сан-
Франциско ми пропонуємо дворівневу комерційну нерухомість з площею
від 100 м² до 500 м², великою вітриною та можливістю розміщення
вивіски.</p>
 <h2>3. Офіси</h2> 
<p>Робота поруч з будинком – практика, яка все активніше стає нашою
повсякденністю. У SAN FRANCISCO Creative House ви зможете слідувати
світовим трендам, адже для розміщення офісів ми передбачили цілих 8
поверхів. При цьому умови роботи в ЖК за своєю якістю нічим не
поступаються умовам проживання. Насичена інфраструктура SAN
FRANCISCO Creative House з кафе та ресторанами, де можна смачно
пообідати з колегами, супермаркет, де можна купити все необхідне,
зелений бульвар, на якому можна відпочити та відволіктися від робочих
завдань. Компанії, які виберуть комерційну нерухомість в ЖК Сан-
Франциско, стануть користувачами мобільного додатку Sfera –
інноваційної онлайн-платформи, за допомогою якої можна оплачувати
рахунки за комунальні послуги, купити квиток в кіно, замовити таксі,
доставку їжі або викликати клінінг-сервіс.
Ми пропонуємо нежитлові приміщення за прийнятною ціною як для
продажу, так і для оренди. Більше інформації про ЖК Сан-Франциско ви
можете дізнатися у менеджера комерційної нерухомості.</p>

<?php } else { ?>
  <h1>КОММЕРЧЕСКАЯ НЕДВИЖИМОСТЬ</h1>
  <p>При строительстве SAN FRANCISCO Creative House мы учли запросы не
  только будущих жильцов, но и владельцев бизнеса, и заранее
  спроектировали помещения для магазинов, кафе, ресторанов. Первые два
  этажа дома занимает нежилая недвижимость площадью от 60 м² до 550 м²
  – это идеальные варианты как для малого, так и для среднего и крупного
  бизнеса. Кроме этого, мы основательно подошли к строительству офисных
  помещений и отвели восемь этажей жилого комплекса для компаний,
  работающих в разных сегментах предпринимательской деятельности.
  ЖК Сан-Франциско – это оптимальная локация для работы юридической
  компании, дизайнерского шоу-рума или концептуальной кофейни.
  Удобное расположение – 5 минут до метро и парка Нивки, в 150 метрах от
  дома находятся остановки наземного транспорта, также есть возможность
  подъехать к дому на автомобиле – особенности, на которые вы точно
  обратите внимание при детальном знакомстве с жилым комплексом. Но
  головное, выбирая SAN FRANCISCO Creative House для коммерческой
  недвижимости, есть возможность быть ближе к своей целевой аудитории.
  Учитывая инфраструктуру района Киева, ваша деятельность точно будет
  пользоваться спросом.</p>
  <h2>1. Рестораны и кафе в SAN FRANCISCO Creative House</h2>
  <p>Первые два этажа дома мы отводим для заведений общественного
  питания. Мы заранее разделяем нежилую недвижимость по назначению,
  оборудуя каждое коммерческое помещение с учетом его функциональных
  особенностей. Для ресторанов и кафе устанавливаем вентиляционные
  выходы, учитываем количество энергопотребления, а также
  предусматриваем безбарьерный вход, который показывает положительную
  динамику на посещаемость клиентов. Большие панорамные окна
  обеспечивают хорошую просматриваемость – еще одно качество, важное
  для заведений.</p>
   <h2>2. Торговые помещения</h2>
  <p>Магазин поблизости с домом – ключевая составляющая его
  инфраструктуры. Жители всегда предпочитают пешую прогулку за
  покупками поездке на автомобиле или на общественном транспорте. А
  если бутик или супермаркет расположены в самом жилом комплексе, это
  создает дополнительное преимущество его владельцу. В ЖК Сан-
  Франциско мы предлагаем двухуровневые коммерческую недвижимость
  для торговой деятельности от 100 м² до 500 м² с большой витриной и
  возможностью размещения вывески.</p>
  <h2>3. Офисы</h2>
  <p>Работа рядом с домом – практика, которая все активнее входит в нашу
  повседневность. SAN FRANCISCO Creative House вы сможете следовать
  мировым трендам, так как для размещения офисов мы предусмотрели
  отдельную секцию дома в 8 этажей. При этом условия работы в ЖК по
  своему качеству ничем не уступают условиям проживания. Насыщенная
  инфраструктура SAN FRANCISCO Creative House с кафе и ресторанами,
  где можно вкусно пообедать с коллегами, супермаркет, где можно купить
  все необходимое, зеленый бульвар, на котором можно отдохнуть и
  отвлечься от выполнения рабочих задач. Компании, которые выберут
  коммерческую недвижимость в ЖК Сан-Франциско, станут
  пользователями мобильного приложения Sfera – инновационной онлайн-
  платформы, с помощью которой можно оплачивать счета за
  коммунальные услуги, купить билет в кино, заказывать такси, доставку
  еды или клининг-сервис.
  Мы предлагаем нежилые помещения по приемлемой цене как для
  продажи, так и для аренды. Больше информации про ЖК Сан-Франциско
  вы можете узнать у менеджера коммерческой недвижимости.</p>
<?php } ?>
  </div>
</div>

<style>
.info-popup {
    z-index: 10000;
   display: block;
   top: 50%;
   width: 100%;
   opacity: 1;
   position: fixed;
   left: 46%;
   transform: translate(-40%, -60%);
   background: #1b1717;
   padding: 15px;
   color: black;
   max-height: 86vh;
   overflow: scroll;
   max-width: 72%;
}
.info-popup .svg_close {
  position: absolute;
  right: 0;
  top: 0;
}
.info-popup h1 {
  text-align: center;
  font-size: 1.6em;
  margin: 10px auto 20px;
  color: #fff;
}
.info-popup p {
  margin-top: 10px;
  line-height: 1.5em;
  color: #fff;
}
.info-popup h2 {
	color: white;
	font-size: 18px;
	margin-top: 10px;
    line-height: 1.5em;
}
</style>

     <!-- Floor choise ends here -->

		<script>
    <? foreach($info['class_name'] as $key=>$value) { ?>
			$('.<?= $value ?>').mouseover(function() {
        document.getElementById("building").innerHTML = "<?=$info['buld'][$key]?>";
        <? /* У некоторых помнещений нет секций */ ?>
        <? if($info['section'][$key] == NULL): ?>
          document.getElementById("section").innerHTML = "-";
        <? else: ?>
          document.getElementById("section").innerHTML = "<?=$info['section'][$key]?>";
        <? endif; ?>
			  document.getElementById("number_of_floors").innerHTML = "<?=$info['number_of_floors'][$key]?>";
        document.getElementById("number").innerHTML = "<?=$info['number'][$key]?>";
        document.getElementById("total_area").innerHTML = "<?=$info['total_area'][$key]?>" + " м2";

			}).mouseout(function()
			{
			// document.getElementById("data").style = "display:none";
			});
    <? } ?>
		</script>

          </div>
          <div class="bottom_form_plan"><a id="callform1" class="button callback"  href="#">замовити дзвінок</a></div>
<?/*copyring*/copyringAdd();?>
        </div>
      </div>
    </div>
<? /*footer*/ FooterAdd($html=['head'=>'Y']);		?>
