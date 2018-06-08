<!DOCTYPE html>
<html>
<head>
    <title>Админ Панель</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/admin/css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="/admin/dart.ico" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
    <ul class="mainMenu">
        <li><a href="/admin/">Главная</a></li>
            <li><button class="newsB">Новости</button></li>
        <li><a id="news1" href="/admin/add_news/">Добавить Новость</a></li>
        <li><a id="news2" href="/admin/edit_news/">Редактировать Новость</a></li>
            <li><button class="hodB">Ход стоительства</button></li>
        <li><a id="hodS1" href="/admin/hod_s_add/">Добавить ход строительтсва</a></li>
        <li><a id="hodS2" href="/admin/hod_s_edit/">Редактировть ход строительства</a></li>
            <li><button class="kvB">Квартиры</button></li>
        <li><a id="kvAdd" href="/admin/apartments_add/">Добавить квартиру</a></li>
        <li><a id="kvAp" href="/admin/apartments_list/">Список квартир</a></li>
            <li><button class="secB">Секция</button></li>
        <li><a id="secAdd" href="/admin/section_add/">Добавить секцию</a></li>
        <li><a id="secLis" href="/admin/section_list/">Список секций</a></li>
    </ul>
    <style>
        .mainMenu{
            background-color: rgba(7,125,1,0.56);
            border-radius: 35px;
            width: 20%;
        }
        .mainMenu>li>a{
            color: black;
        }
        #news1,#news2,#hodS1,#hodS2,#kvAp,#kvAdd,#secAdd,#secLis{
            display: none;
        }
    </style>
    <script>
        $(document).ready(function(){
            $("button.newsB").click(function(){
                $("#news1").fadeIn("slow");
                $("#news2").fadeIn("slow");
                $("#hodS1").fadeOut();
                $("#hodS2").fadeOut();
                $("#kvAp").fadeOut();
                $("#kvAdd").fadeOut();
                $("#secAdd").fadeOut();
                $("#secLis").fadeOut();

            });
        });
        $(document).ready(function(){
            $("button.hodB").click(function(){
                $("#hodS1").fadeIn("slow");
                $("#hodS2").fadeIn("slow");
                $("#news1").fadeOut();
                $("#news2").fadeOut();
                $("#kvAp").fadeOut();
                $("#kvAdd").fadeOut();
                $("#secAdd").fadeOut();
                $("#secLis").fadeOut();

            });
        });
        $(document).ready(function(){
            $("button.kvB").click(function(){
                $("#kvAp").fadeIn("slow");
                $("#kvAdd").fadeIn("slow");
                $("#hodS1").fadeOut();
                $("#hodS2").fadeOut();
                $("#news1").fadeOut();
                $("#news2").fadeOut();
                $("#secAdd").fadeOut();
                $("#secLis").fadeOut();

            });
        });
        $(document).ready(function(){
            $("button.secB").click(function(){
                $("#secAdd").fadeIn("slow");
                $("#secLis").fadeIn("slow");
                $("#hodS1").fadeOut();
                $("#hodS2").fadeOut();
                $("#news1").fadeOut();
                $("#news2").fadeOut();
                $("#kvAp").fadeOut();
                $("#kvAdd").fadeOut();
            });
        });
        $(document).keyup(function(e) {
            if (e.keyCode == 27) { // escape key maps to keycode `27`
                $("#hodS1").fadeOut();
                $("#hodS2").fadeOut();
                $("#news1").fadeOut();
                $("#news2").fadeOut();
                $("#kvAp").fadeOut();
                $("#kvAdd").fadeOut();
                $("#secAdd").fadeOut();
                $("#secLis").fadeOut();


            }
        });
    </script>
