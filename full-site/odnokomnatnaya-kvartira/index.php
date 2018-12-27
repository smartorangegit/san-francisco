<? /*head*/ HeadAdd($html=['head'=>'Y']);	?>
<link rel="stylesheet" href="/css/appart.css">
<link rel="stylesheet" href="/css/flattype.css">
    <div class="main_page long_page clearfix">
           <?  /*Menu*/ MenuAdd();  ?>

      <div class="content content_flattype">
        <div class="content_wrap clearfix">
          <h1 class="content_name"><?=$mes['odno-mes1']?></h1>
          <!-- <div class="content_subname"><?=$mes['odno-mes2']?></div> -->
          <div class="content_text"><?=$mes['soc-mes1']?></div>
          <div class="results_box__outer">
            <div class="results_box">

              <table>
                <thead>
                  <tr>
                    <th>корпус</th>
                    <th>поверх</th>
                    <th>№</th>
                    <th>кімнат</th>
                    <th>площа, м<sup>2</sup></th>
                  </tr>
                </thead>
                <tbody>
                  <tr><td>2</td>  <td>5</td>  <td>1</td>  <td>3</td>  <td>38</td></tr>
                  <tr><td>2</td>  <td>4</td>  <td>1</td>  <td>2</td>  <td>42</td></tr>
                  <tr><td>2</td>  <td>4</td>  <td>1</td>  <td>2</td>  <td>44,5</td></tr>
                  <tr><td>2</td>  <td>5</td>  <td>1</td>  <td>3</td>  <td>124,2</td></tr>
                  <tr><td>2</td>  <td>5</td>  <td>1</td>  <td>3</td>  <td>44,5</td></tr>
                  <tr><td>2</td>  <td>6</td>  <td>1</td>  <td>3</td>  <td>55.6</td></tr>
                  <tr><td>2</td>  <td>6</td>  <td>1</td>  <td>4</td>  <td>124</td></tr>
                  <tr><td>2</td>  <td>7</td>  <td>1</td>  <td>4</td>  <td>118,1</td></tr>
                  <tr><td>2</td>  <td>7</td>  <td>1</td>  <td>4</td>  <td>56,6</td></tr>
                  <tr><td>2</td>  <td>8</td>  <td>1</td>  <td>4</td>  <td>76,5</td></tr>
                  <tr><td>2</td>  <td>8</td>  <td>1</td>  <td>4</td>  <td>112,1</td></tr>
                </tbody>
              </table>
            </div>
          </div>

          <p class="content_subname">
            Переваги 1-кімнатних квартир в ЖК CHICAGO Central House
          </p>
          <div class="content_text">
              Однокімнатні квартири в житловому комплексі CHICAGO Central House відповідають всім ключовим характеристикам комфортного житла і при цьому мають прийнятну ціну. Якщо ж додати сюди вдале розташування комплексу та близькість до ключових об′єктів столиці, можна впевнено стверджувати, що 1-кімнатні квартири в ЖК CHICAGO Central House є максимально вигідною пропозицією.
              <br>
              1-кімнатні квартири комплексу доволі просторі. Їхня мінімальна площа − 42 м2. Між іншим, придбання такої нерухомості є ідеальним варіантом для однієї людини або пари без дітей.
              <br>
              Великим попитом 1-кімнатне житло користується в молоді: часто такі квартири купують батьки своїм дітям-студентам. Додатковий плюс − поряд із ЖК CHICAGO Central House багато престижних вишів, до яких можна дійти навіть пішки.
              <br>
              Популярні 1-кімнатні квартири і серед приватних інвесторів. Купівля нерухомості в новобудові на ранніх стадіях будівництва та її подальший продаж дуже вигідний: по-перше, квадратні метри щороку дорожчають, а по-друге, таке житло можна здавати в оренду й отримувати непоганий прибуток.
              <br>
              Чому варто купити однокімнатну квартиру в ЖК CHICAGO Central House
              <br>
              Доступна ціна й площа, що дає змогу жити з комфортом не тільки одному, але і двом людям.
              Вільне планування. Ви самостійно вирішуєте, яким буде ваше майбутнє житло. Крім того, ми пропонуємо безліч варіантів готових планувань на будь-який смак і відповідно до потреб власника.
              Економія грошей. 1-кімнатну квартиру завжди продати легко, а вдале розташування комплексу дає змогу знайти орендаря досить швидко.
              Залиште свій контактний номер телефону, щоб отримати вичерпну інформацію та записатися на екскурсію. Станьте на крок ближче до мрії з ЖК CHICAGO Central House.
          </div>


        </div>
        <div class="flattype_form form">
          <!-- <div class="form"> -->
              <!-- <img id="formclose" src="/img/close.svg" alt="close" width="40"> -->
              <div class="content_name">зв&prime;язок</div>
              <!-- <div class="content_text">Наші менеджери предзвонять вам у найкоротший час</div> -->
              <div class="form_wrap">
                <form id="form_main" class="" action="application.php" method="post">
                  <div class="input">
                    <input type="text" name="name" value="" placeholder="І&prime;МЯ" id="callbackName">
                  </div>
                  <div class="input">
                    <input type="tel" class='inputtelmask' name="tel" value="" placeholder="ТЕЛЕФОН" id="callbackTel">
                  </div>
                  <div class="input">
                    <input type="email" name="email" value="" placeholder="E-MAIL" id="callbackEmail">
                  </div>
                    <input  name="webad" class="webad" type="hidden" value="<?=$webAd;?>"/>
                    <input  name="metka" class="metka" type="hidden" value="San-francisco with text"/>
                    <input  name="inn" class="userInn" type="hidden" value="San-francisco"/>
                    <!-- <div class="not" id="reCaptcha1" ></div> -->
                  <div class="input">
                    <input class="button" type="submit" name="" value="Надіслати">
                  </div>
                </form>
              </div>
          <!-- </div> -->

        </div>
		
		   <!-- <div class="bottom_form"><a id="callform1" class="button callback"  href="#">замовити дзвінок</a></div> -->
      </div>


    </div>
<? /*footer*/ FooterAdd($html=['head'=>'Y']);	?>
