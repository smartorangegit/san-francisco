window.onload = function() {
    $("#t_ua").css("display", "none");
    $("#t_ru").css("display", "none");
    $("#t_en").css("display", "none");
    form('#del_news');
};
/*появление зеленых птичек*/
var ct_ua = 0;
var ct_ru = 0;
var ct_en = 0;
function countme1() {
    ++ct_ua;
    if(ct_ua==12){
        $("#t_ua").css("display", "block");
        $("#t_ua").css("color", "green");

    }

}
function countme2() {
    ++ct_ru;
    if(ct_ru==12){
        $("#t_ru").css("display", "block");
        $("#t_ru").css("color", "green");

    }

}
function countme3() {
    ++ct_en;
    if(ct_en==12){
        $("#t_en").css("display", "block");
        $("#t_en").css("color", "green");

    }

}
/*конец птичкам*/

/*удаление пустой новости, кнопка появляется если есть пустая новость*/
$(document).ready(function(){
    $("#d_e_n").submit(function(e) { //устанавливаем событие отправки для формы с id=form
        e.preventDefault();
        var form_data = $(this).serialize(); //собераем все данные из формы
        $.ajax({
            type: "POST", //Метод отправки
            url: "/admin/del_empty.php", //путь до php фаила отправителя
            data: form_data,
            success: function() {
                //код в этом блоке выполняется при успешной отправке сообщения
                alert("Пустые новости удалены!");
            }
        });
    });
});
/*удаление новости
* */
function form(id){

    $(id).submit(function(event) { //устанавливаем событие отправки для формы с id=form

        event.preventDefault()

        var form_data = $(this).serialize(); //собераем все данные из формы
        $.ajax({
            type: "POST", //Метод отправки
            url: "/admin/delete.php", //путь до php фаила отправителя
            data: form_data,
            processData: false,
            success: function(html) {
                //код в этом блоке выполняется при успешной отправке сообщения
                alert(html);
                location.replace('/admin/edit_news/');


            }
        });
    });
}

/*добавление новости*/
$(document).ready(function () {

    function readImage ( input ) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function printMessage(destination, msg) {

        $(destination).removeClass();

        if (msg == 'success') {
            $(destination).addClass('alert alert-success').text('Файл успешно загружен.');
        }

        if (msg == 'error') {
            $(destination).addClass('alert alert-danger').text('Произошла ошибка при загрузке файла.');
        }

    }

    $('#image').change(function(){
        readImage(this);
    });

    $('#upload-image').on('submit',(function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type:'POST', // Тип запроса
            url: '/admin/application.php', // Скрипт обработчика
            data: formData, // Данные которые мы передаем
            cache:false, // В запросах POST отключено по умолчанию, но перестрахуемся
            contentType: false, // Тип кодирования данных мы задали в форме, это отключим
            processData: false, // Отключаем, так как передаем файл
            success:function(data){
                alert(data);
                location.replace('/admin/edit_news/');
                printMessage('#result', data);
            },
            error:function(data){
                console.log(data);
            }
        });
    }));
});
/*обновление новости*/
$(document).ready(function () {

    function readImage ( input ) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function printMessage(destination, msg) {

        $(destination).removeClass();

        if (msg == 'success') {
            $(destination).addClass('alert alert-success').text('Файл успешно загружен.');
        }

        if (msg == 'error') {
            $(destination).addClass('alert alert-danger').text('Произошла ошибка при загрузке файла.');
        }

    }

    $('#image').change(function(){
        readImage(this);
    });

    $('#upload-image2').on('submit',(function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type:'POST', // Тип запроса
            url: '/admin/update_news.php', // Скрипт обработчика
            data: formData, // Данные которые мы передаем
            cache:false, // В запросах POST отключено по умолчанию, но перестрахуемся
            contentType: false, // Тип кодирования данных мы задали в форме, это отключим
            processData: false, // Отключаем, так как передаем файл
            success:function(data){
                alert(data);
                location.replace('/admin/edit_news/');
                console.log(data);
            },
            error:function(data){
                console.log(data);
            }
        });
    }));
});

/*кнопка наверх*/
$(document).ready(function(){
    $('body').append('<a href="#" id="go-top" title="Вверх">Вверх</a>');
});

$(function() {
    $.fn.scrollToTop = function() {
        $(this).hide().removeAttr("href");
        if ($(window).scrollTop() >= "150") $(this).fadeIn("slow")
        var scrollDiv = $(this);
        $(window).scroll(function() {
            if ($(window).scrollTop() <= "150") $(scrollDiv).fadeOut("slow")
            else $(scrollDiv).fadeIn("slow")
        });
        $(this).click(function() {
            $("html, body").animate({scrollTop: 0}, "slow")
        })
    }
});

$(function() {
    $("#go-top").scrollToTop();
});

/*логин*/
$(document).ready(function(){
    $("#login").submit(function(e) { //устанавливаем событие отправки для формы с id=form
        e.preventDefault();

        var form_data = $(this).serialize(); //собераем все данные из формы

        $.ajax({
            type: "POST", //Метод отправки
            url: "/admin/login.php", //путь до php фаила отправителя
            data: form_data,
            success: function(html) {
                alert(html);
                location.reload();
            }
                //код в этом блоке выполняется при успешной отправке сообщения

        });
    });
});
/*логаут*/
$(document).ready(function(){
    $("#logout").submit(function(e) { //устанавливаем событие отправки для формы с id=form
        e.preventDefault();

        var form_data = $(this).serialize(); //собераем все данные из формы

        $.ajax({
            type: "POST", //Метод отправки
            url: "/admin/logout.php", //путь до php фаила отправителя
            data: form_data,
            success: function(html) {
                alert('Сессия закрыта!');
                location.reload();
            }
            //код в этом блоке выполняется при успешной отправке сообщения

        });
    });
});
/*мульти загрузка и отправка данных на добавление в бд (ход строительства)*/
$(document).ready(function () {

    function readImage ( input ) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function printMessage(destination, msg) {

        $(destination).removeClass();

        if (msg == 'success') {
            $(destination).addClass('alert alert-success').text('Файл успешно загружен.');
        }

        if (msg == 'error') {
            $(destination).addClass('alert alert-danger').text('Произошла ошибка при загрузке файла.');
        }

    }

    $('#image').change(function(){
        readImage(this);
    });

    $('#up_i_h').on('submit',(function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type:'POST', // Тип запроса
            url: '/admin/multy_img.php', // Скрипт обработчика
            data: formData, // Данные которые мы передаем
            cache:false, // В запросах POST отключено по умолчанию, но перестрахуемся
            contentType: false, // Тип кодирования данных мы задали в форме, это отключим
            processData: false, // Отключаем, так как передаем файл
            success:function(data){
                alert(data);
                location.replace('/admin/hod_s_edit/');
                printMessage('#result', data);
            },
            error:function(data){
                console.log(data);
            }
        });
    }));
});
/*обнова хода стройки*/
$(document).ready(function () {

    function readImage ( input ) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function printMessage(destination, msg) {

        $(destination).removeClass();

        if (msg == 'success') {
            $(destination).addClass('alert alert-success').text('Файл успешно загружен.');
        }

        if (msg == 'error') {
            $(destination).addClass('alert alert-danger').text('Произошла ошибка при загрузке файла.');
        }

    }

    $('#image').change(function(){
        readImage(this);
    });

    $('#up_i_h_up').on('submit',(function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type:'POST', // Тип запроса
            url: '/admin/update_hod.php', // Скрипт обработчика
            data: formData, // Данные которые мы передаем
            cache:false, // В запросах POST отключено по умолчанию, но перестрахуемся
            contentType: false, // Тип кодирования данных мы задали в форме, это отключим
            processData: false, // Отключаем, так как передаем файл
            success:function(data){
                alert(data);
                //location.replace('/admin/hod_s_edit/');
                //location.replace('/admin/edit_news/');
                printMessage('#result', data);
                console.log(data);
            },
            error:function(data){
                console.log(data);
            }
        });
    }));
});
/*удаление изображение с хода строительства*/
$(document).ready(function(){
    $('#dell_img_hod').submit(function(e) { //устанавливаем событие отправки для формы с id=form
        e.preventDefault();
        var form_data = $(this).serialize(); //собераем все данные из формы
        $.ajax({
            type: "POST", //Метод отправки
            url: "/admin/del_img_hod.php", //путь до php фаила отправителя
            data: form_data,
            success: function(html) {
                //код в этом блоке выполняется при успешной отправке сообщения
                alert(html);//"Изображение удалено!"
            }
        });
    });
});
