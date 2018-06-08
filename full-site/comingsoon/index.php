<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>San Francisco city house - центр там, де ти!</title>
  	<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/hover.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  </head>
  <body>
  <style media="screen">
  .main_page{
    width: 100%;
    height: 100%;
    background:url('/img/soon_bg.jpg');
    background-size: cover;
  }
  .content.content_comingsoon{
    width: 100%;
    position: relative;
    margin-left: 0;
  }
  .logo-venok{
    position: absolute;
    width: 40vh;
    height: 40vh;
    top: 0; left: 0; right: 0; bottom: 0;
    margin: auto;
    background-image: url('/img/venok.png');
    background-size: 100% 100%;

  }
  .logo-lights{
    width: 100%;
    height: 100%;
    background-image: url('/img/venok_light.png');
    background-size: 100% 100%;
    position: relative;
    transition: 0.5s;
    animation: 2s infinite ease-in-out lights;
  }
  img{
    display: block;
    width: 30vh;
    height: auto;
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    margin: auto;

  }
  div.input {
    display: inline-block;
  }
@keyframes lights {
  0%{opacity: 0.3;}
    25%{opacity: 0.8;}
      50%{opacity: 1;}
        75%{opacity: 0.5;}
          100%{opacity: 0;}
}
.content_text{
  letter-spacing: 9px;
  text-transform: uppercase;
  position: absolute;
  margin: 0 auto;
  width: 100%;
  text-align: center;
  text-align: -webkit-center;
  top: 72vh;
  padding: 0;
}
.form{
  display: block;
  position: absolute;
  width: 1000px;
  height: 90px;
  top:78vh;
  background: rgba(0,0,0,0.4);
}
.form_wrap {
  padding-top: 22px;
}
.form input {
  width: 260px;
  margin: 0 auto;
}
.form input[type="submit"]{
  width: 150px;
  margin-top: 0;
}
.form input[type="submit"]:hover{
  border-color: red;
}
.form .input::before, .form .input::after {
    height: 1px;
  }
.form .input::before{ top:0 }
.form .input::after { bottom: 0;}
@media only screen and (max-width: 768px){
.main_page{min-height:550px}
body, html { height: 100%;}
.logo-venok {
    width: 220px;
   height: 220px;
 }
.form {
 top:290px;
 width: 90%;
 max-width: 380px;
 height: 240px;
 bottom:auto;
}
div.input {
 margin: 6px auto;
}
.logo-venok{
 top:36px;
 bottom: auto;
}
img {
 width: 160px;
}
.content_text {
   letter-spacing: 4px;
   top: 265px;
   padding: 0;
 }

}
  </style>
    <div class="main_page">
      <div class="content content_comingsoon">
        <div class="logo-venok">
          <img src="/img/logo_w.svg" alt="San Francisco">
          <div class="logo-lights">
          </div>
        </div>


        <div class="content_text">
          дізнайтеся першими
        </div>

        <div class="form">

            <div class="form_wrap">
              <form id="form" class="" method="post" action="/comingsoon/application/" enctype="multipart/form-data">
                <div class="input">
                  <input type="text" name="fio" value="" placeholder="І&prime;МЯ">
                </div>
                <div class="input">
                  <input type="phone" name="phone" value="" placeholder="ТЕЛЕФОН">
                </div>
                <div class="input">
                  <input type="email" name="email" value="" placeholder="E-MAIL">
                </div>
                <div class="input">
                  <input class="button" type="submit" name="" value="Надіслати">
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
<script type="text/javascript">
/*
$(document).ready(function(){

    $("#form").submit(function() { //устанавливаем событие отправки для формы с id=form
            var form_data = $(this).serialize(); //собераем все данные из формы
            $.ajax({
            type: "POST", //Метод отправки
            url: "application.php", //путь до php фаила отправителя
            data: form_data,
            success: function() {
                   //код в этом блоке выполняется при успешной отправке сообщения
                   alert("Ваше сообщение отпрвлено!");
            }
	});
    });
});  
*/
</script>

  </body>
</html>
