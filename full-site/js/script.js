
// плавный переход меню по главной
    $(".menu").on("click","a.link", function (event) {
        event.preventDefault();
      var id  = $(this).attr('href')
      var top = $(id).offset().top;
      $('body,html').animate({scrollTop:top}, 800, 'swing');
    });

// mobile menu
    $('.mobile_menu').click(function(){
      $('.menu .nav').css('transition','0.5s').css('max-height','1000px'),
      $('.mobile_menu').css('display','none')
    });
    $('#close').click(function () {
      $('.menu .nav').css('max-height','0'),
      $('.mobile_menu').css('display','block')
    });


// new menu hover

// $('.dropdown_link').mouseover(function(){
//   $(this).find('.dropdown').addClass('dropdown__active')
//   // $(this).find('.dropdown').stop().slideDown(400).css('height','auto');
// });
// $('.dropdown_link').mouseout(function(){
//   $(this).find('.dropdown').removeClass('dropdown__active')
//    // $(this).find('.dropdown').stop().slideUp(400);
// });

// new menu click

$('.dropdown_link').click(function(e){
  e.preventDefault();
  if( $(this).find('.dropdown').hasClass('dropdown__active') ){

        $(this).find('.dropdown').removeClass('dropdown__active')
  }
  else{
    $('.dropdown').removeClass('dropdown__active')
    $(this).find('.dropdown').addClass('dropdown__active')
  }
  // $(this).find('.dropdown').stop().slideDown(400).css('height','auto');
})
.children()
    .click(function(e){        // вешаем на потомков
        e.stopPropagation();   // предотвращаем всплытие
    });


// $('.dropdown_link').mouseout(function(){
//   $(this).find('.dropdown').removeClass('dropdown__active')
//    // $(this).find('.dropdown').stop().slideUp(400);
// });



// map__link

$(".place__map").click(function(e){
  // e.preventDefault;
  $(".bigmap_overlay").addClass("over__active"),
  $(".bigmap_box").fadeIn()
  });
  $(".bigmap__close, .bigmap_overlay").click(function(){
    $(".bigmap_overlay").removeClass("over__active"),
    $(".bigmap_box").fadeOut("slow")
  });


// preloader
$(window).on('load', function () {
	var $preloader = $('.box_preloader'),
			$svg_anm   = $preloader.find('.box_preloader .container');
			$preloader.delay(300).fadeOut('slow');
			$svg_anm.delay(1500).fadeOut();
	});

// callbackform

$('#callform,#callform1').click(function(e){
  e.preventDefault();
  $('.overlay').fadeIn(300,
  function(){
    $('#form_main-container').css('display','block').animate({opacity: 1, top: '60%'}, 200);
  })
});
$('#formclose, .overlay').click(function(){
  $('#form_main-container').animate({opacity: 0, top: '10%'}, 200,
    function(){
      $(this).css('display','none');
      $('.overlay').fadeOut(300);
    })
});

// callbackform-ctc

$('#callform-ctc').click(function(e){
  e.preventDefault();
  $('.overlay').fadeIn(300,
  function(){
    $('#form_main-container-ctc').css('display','block').animate({opacity: 1, top: '60%'}, 200);
  })
});
$('#formclose-ctc, .overlay').click(function(){
  $('#form_main-container-ctc').animate({opacity: 0, top: '10%'}, 200,
    function(){
      $(this).css('display','none');
      $('.overlay').fadeOut(300);
    })
});
//form for ab testing google
$('#for_ab_testing_google').click(function(e){
  e.preventDefault();
  $('.overlay').fadeIn(300,
  function(){
    $('.form_new').css('display','block').animate({opacity: 1, top: '20%'}, 200);
  })
});
$('#formclose_new, .overlay').click(function(){
  $('#form_new-container').animate({opacity: 0, top: '10%'}, 200,
    function(){
      $(this).css('display','none');
      $('.overlay').fadeOut(300);
    })
});
//end form for ab testing google
$('#formclose-ok, .overlay').click(function(){
	  $('.form-ok').animate({opacity: 0, top: '10%'}, 200,
    function(){
      $(this).css('display','none');
      $('.overlay').fadeOut(300);
    });
});


$('#callformPrice').click(function(){
  $('.overlay').fadeIn(300,
  function(){
    $('.form').css('display','block').animate({opacity: 1, top: '60%'}, 200);
  })
});

// callbackform

$('#callform2').click(function(){
  $('.overlay').fadeIn(300,
  function(){
    $('.form').css('display','block').animate({opacity: 1, top: '60%'}, 200);
  })
});
$('#formclose, .overlay').click(function(){
  $('#form_main-container').animate({opacity: 0, top: '10%'}, 200,
    function(){
      $(this).css('display','none');
      $('.overlay').fadeOut(300);
    })
});

// realtor-form
$(".rieltor_btn").on("click", function(e) {
    e.preventDefault();
    if(($("#static-form").css("display") === 'none' && $("#realtor-static-form").css("display") === 'none') || 
    ($("#static-form").css("display") === 'block' && $("#realtor-static-form").css("display") === 'block')) {
        $("#static-form").toggle();
        $('#realtor-static-form').css({"display" : "none"});
    } else {
        $("#static-form").toggle();
        $("#realtor-static-form").toggle();
    }
    $('#form_service_department-form-container').css({"display" : "none"});
});
// end__realtor-form

// service department btn
$('.service_dep_btn').click(function(e) {
    e.preventDefault();
    $("#static-form").css({"display" : "none"});
    $("#realtor-static-form").css({"display" : "none"});
    $('#form_service_department-form-container').css({"display" : "block"});
});
// service department btn



$(document).ready(function(){
    form('#form_main');
	form('#form_static');
	form('#form_call_commercial');
    form('#form_rieltor');
    form('#form_service_department');
    // Выбор языка
    $('.language_select').mouseover(function() {
        $(this).removeClass('language_select_hidden');
    });
    $('.language_select').mouseout(function() {
        $(this).addClass('language_select_hidden');
    });

    var logic1 = function( currentDateTime ){
        if ( currentDateTime.getDate() == new Date().getDate() ){
            this.setOptions({
                minTime: new Date()
            });
        } else
        {
            this.setOptions({
                minTime:'9:00'
            });
        }
    };
    
    $('.map_form_datepicker').datetimepicker({
        theme:'dark',
        minDate: new Date(),
        maxTime: '20:00',
        yearStart: 2018,
        yearEnd: 2018,
        dayOfWeekStart : 1,
        onSelectDate: logic1,
        onShow: logic1
    });

    $('.form_service_department_datepicker').datetimepicker({
        theme:'dark',
        minDate: new Date(),
        maxTime: '20:00',
        yearStart: 2018,
        yearEnd: 2018,
        dayOfWeekStart : 1,
        onSelectDate: logic1,
        onShow: logic1
    });


});

    //Валидация
    // function validateForm(name, phone, email) {
    //     var nameReg = /^[A-Za-z]+$/;
    //     var numberReg = /^[\d ()+]{4,7} \d{3} \d{3}-\d{2}-\w{1,2}$/;
    //     var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    //     var inputVal = [name, phone, email];
    //     var inputMessage = ["І&prime;МЯ", "ТЕЛЕФОН", "E-MAIL"];

    //     $('.error_callback').hide();

    //     if (inputVal[1] == "") {
    //         $('#callbackTel').after('<span class="error_callback"> Введіть будь ласка Ваш ' + inputMessage[1] + '</span>');
    //         return false;
    //     } else if(!numberReg.test(inputVal[1])) {
    //         $('#callbackTel').after('<span class="error_callback"> Неправильний формат ' + inputMessage[1] + 'У</span>');
    //         return false;
    //     }
    //     return true;
    // }

	/*
 hey, [be]Lazy.js - v1.8.2-my - 2016.10.25
  A fast, small and dependency free lazy load script (https://github.com/dinbror/blazy)
  (c) Bjoern Klinggaard - @bklinggaard - http://dinbror.dk/blazy
*/
(function(n,l){"function"===typeof define&&define.amd?define(l):"object"===typeof exports?module.exports=l():n.Blazy=l()})(this,function(){function n(b){var c=b._util;c.elements=E(b.options);c.count=c.elements.length;c.destroyed&&(c.destroyed=!1,b.options.container&&p(b.options.container,function(a){q(a,"scroll",c.validateT)}),q(window,"resize",c.saveViewportOffsetT),q(window,"resize",c.validateT),q(window,"scroll",c.validateT));l(b)}function l(b){for(var c=b._util,a=0;a<c.count;a++){var d=c.elements[a];
a:{var f=d,h=b.options;var m=f.getBoundingClientRect();if(h.container&&y&&(f=f.closest(h.containerClass))){var r=f.getBoundingClientRect();if(t(r,e)){var f=r.top-h.offset,g=r.right+h.offset,k=r.bottom+h.offset,h=r.left-h.offset;m=t(m,{top:f>e.top?f:e.top,right:g<e.right?g:e.right,bottom:k<e.bottom?k:e.bottom,left:h>e.left?h:e.left})}else m=!1;break a}m=t(m,e)}if(m||u(d,b.options.successClass))b.load(d),c.elements.splice(a,1),c.count--,a--}0===c.count&&b.destroy()}function t(b,c){return b.right>=c.left&&
b.bottom>=c.top&&b.left<=c.right&&b.top<=c.bottom}function z(b,c,a){if(!u(b,a.successClass)&&(c||a.loadInvisible||0<b.offsetWidth&&0<b.offsetHeight)){c=b.getAttribute(v)||b.getAttribute(a.src);var d=b.getAttribute("data-option");if(c){c=c.split(a.separator);var f=c[A&&1<c.length?1:0],h=b.getAttribute(a.srcset),m="img"===b.nodeName.toLowerCase(),e=(c=b.parentNode)&&"picture"===c.nodeName.toLowerCase();if(m||void 0===b.src){var g=new Image,l=function(){a.error&&a.error(b,"invalid");w(b,a.errorClass);
k(g,"error",l);k(g,"load",n)},n=function(){m?e||B(b,f,h):d?b.style.background='url("'+f+'") '+d+"":b.style.backgroundImage='url("'+f+'")';x(b,a);k(g,"load",n);k(g,"error",l)};e&&(g=b,p(c.getElementsByTagName("source"),function(b){var c=a.srcset,f=b.getAttribute(c);f&&(b.setAttribute("srcset",f),b.removeAttribute(c))}));q(g,"error",l);q(g,"load",n);B(g,f,h)}else b.src=f,x(b,a)}else"video"===b.nodeName.toLowerCase()?(p(b.getElementsByTagName("source"),function(b){var c=a.src,f=b.getAttribute(c);f&&
(b.setAttribute("src",f),b.removeAttribute(c))}),b.load(),x(b,a)):(a.error&&a.error(b,"missing"),w(b,a.errorClass))}}function x(b,c){w(b,c.successClass);c.success&&c.success(b);b.removeAttribute(c.src);b.removeAttribute(c.srcset);p(c.breakpoints,function(a){b.removeAttribute(a.src)})}function B(b,c,a){a&&b.setAttribute("srcset",a);b.src=c}function u(b,c){return-1!==(" "+b.className+" ").indexOf(" "+c+" ")}function w(b,c){u(b,c)||(b.className+=" "+c)}function E(b){var c=[];b=b.root.querySelectorAll(b.selector);
for(var a=b.length;a--;c.unshift(b[a]));return c}function C(b){e.bottom=(window.innerHeight||document.documentElement.clientHeight)+b;e.right=(window.innerWidth||document.documentElement.clientWidth)+b}function q(b,c,a){b.attachEvent?b.attachEvent&&b.attachEvent("on"+c,a):b.addEventListener(c,a,{capture:!1,passive:!0})}function k(b,c,a){b.detachEvent?b.detachEvent&&b.detachEvent("on"+c,a):b.removeEventListener(c,a,{capture:!1,passive:!0})}function p(b,c){if(b&&c)for(var a=b.length,d=0;d<a&&!1!==c(b[d],
d);d++);}function D(b,c,a){var d=0;return function(){var f=+new Date;f-d<c||(d=f,b.apply(a,arguments))}}var v,e,A,y;return function(b){if(!document.querySelectorAll){var c=document.createStyleSheet();document.querySelectorAll=function(a,b,d,e,g){g=document.all;b=[];a=a.replace(/\[for\b/gi,"[htmlFor").split(",");for(d=a.length;d--;){c.addRule(a[d],"k:v");for(e=g.length;e--;)g[e].currentStyle.k&&b.push(g[e]);c.removeRule(0)}return b}}var a=this,d=a._util={};d.elements=[];d.destroyed=!0;a.options=b||
{};a.options.error=a.options.error||!1;a.options.offset=a.options.offset||100;a.options.root=a.options.root||document;a.options.success=a.options.success||!1;a.options.selector=a.options.selector||".b-lazy";a.options.separator=a.options.separator||"|";a.options.containerClass=a.options.container;a.options.container=a.options.containerClass?document.querySelectorAll(a.options.containerClass):!1;a.options.errorClass=a.options.errorClass||"b-error";a.options.breakpoints=a.options.breakpoints||!1;a.options.loadInvisible=
a.options.loadInvisible||!1;a.options.successClass=a.options.successClass||"b-loaded";a.options.validateDelay=a.options.validateDelay||25;a.options.saveViewportOffsetDelay=a.options.saveViewportOffsetDelay||50;a.options.srcset=a.options.srcset||"data-srcset";a.options.src=v=a.options.src||"data-src";a.options.options=a.options.options||"data-options";y=Element.prototype.closest;A=1<window.devicePixelRatio;e={};e.top=0-a.options.offset;e.left=0-a.options.offset;a.revalidate=function(){n(a)};a.load=
function(a,b){var c=this.options;a&&void 0===a.length?z(a,b,c):p(a,function(a){z(a,b,c)})};a.destroy=function(){var b=a._util;a.options.container&&p(a.options.container,function(a){k(a,"scroll",b.validateT)});k(window,"scroll",b.validateT);k(window,"resize",b.validateT);k(window,"resize",b.saveViewportOffsetT);b.count=0;b.elements.length=0;b.destroyed=!0};d.validateT=D(function(){l(a)},a.options.validateDelay,a);d.saveViewportOffsetT=D(function(){C(a.options.offset)},a.options.saveViewportOffsetDelay,
a);C(a.options.offset);p(a.options.breakpoints,function(a){if(a.width>=window.screen.width)return v=a.src,!1});setTimeout(function(){n(a)})}});

  (function() {

    // Initialize
    var bLazy = new Blazy();
  })();


    //============= Modal window start ========
    ;(function() {
        function closeModal() {
            $('.modal_window__container').css({'display': 'none'});
        }
        $('.modal_window__close').click(closeModal);
        $('.modal_window__link').click(closeModal);
        $('.modal_window__container').click(closeModal);
    })();
    //============= Modal window end ========



    //============= Mask and international number start ========

        var telInput = $("form input[type='tel']");
        $.mask.definitions['#']='[0-9]';
        $.mask.definitions['9'] = '';
        telInput.mask("+38 (0##) ###-##-##",{placeholder:"_", autoclear: false});

        telInput.intlTelInput({
            initialCountry: 'ua',
            preferredCountries: ['ua' ,'ru'],
            nationalMode: false
        });

        $(telInput).on("countrychange", function(e, countryData) {
            $(this).blur();
            $(this).intlTelInput("setNumber", "");
            if(countryData.name === "Ukraine (Україна)") {
                $(this).mask("+38 (0##) ###-##-##",{placeholder:"_", autoclear: false});
            } else {
                $(this).mask( '+' + countryData.dialCode + ' (###) ###-##-?##',{placeholder:"_", autoclear: false});
            }
        });

        // Validator constructor start
        function Validator(selector, formId) {
            this.selector = formId+ " " +selector;
            this.value = $(this.selector).find('.input-box__field').val();
            this.valid = false;
            this.type = 'text';
        };

        Validator.prototype.update = function() {
            this.value = $(this.selector).find('.input-box__field').val();
        }; //Update objects value

        Validator.prototype.clearInput = function() {
            $(this.selector).find('.input-box__field').val('');
            this.validate();
        }; //Clear input when clicking X
        Validator.prototype.filled = function() {
            if(this.value.length === 0) {
                this.valid = false;
                this.showEmptyInputError();
                return false;
            } else {
                return true;
            }
        };
        Validator.prototype.showEmptyInputError = function() {
            $(this.selector).find('.input-box__field').removeClass('input-box__field_valid');
            $(this.selector).find('.empty-input').removeClass('empty-input_hidden').addClass('empty-input_visible');
        }; //Show error if field is empty

        Validator.prototype.hideEmptyInputError = function() {
            $(this.selector).find('.empty-input').removeClass('empty-input_visible').addClass('empty-input_hidden');
        }; //Remove empty field error message

        Validator.prototype.validate = function() {
            if(this.filled()) {
                this.valid = true;
                $(this.selector).find('.input-box__field').addClass('input-box__field_valid');
            } else {
                this.valid = false;
            }
        };

        // Validator constructor end

        // PhoneValidator constructo start
        function PhoneValidator(selector, id) {
            Validator.call(this, selector, id);
            this.type = 'phone';
        }
        PhoneValidator.prototype = Object.create(Validator.prototype);
        PhoneValidator.prototype.constructor = PhoneValidator;
        PhoneValidator.prototype.filled = function() {
            var re = /^[\d \+]{2,6} [\d ())]{4,8}\d{3}-\d{2}-\w{1,2}$/;
            if(re.test(this.value)) {
                return true;
            } else {
                return false;
            }
        }
        PhoneValidator.prototype.showInvalidNumberError = function() {
            $(this.selector).find('.invalid-number').removeClass('invalid-number_hidden').addClass('invalid-number_visible');
        };
        PhoneValidator.prototype.hideInvalidNumberError = function() {
            $(this.selector).find('.invalid-number').removeClass('invalid-number_visible').addClass('invalid-number_hidden');
        };
        PhoneValidator.prototype.validate = function() {
            if(this.filled()) {
                this.valid = true;
                $(this.selector).find('.input-box__field').addClass('input-box__field_valid');
            } else {
                this.valid = false;
                this.showInvalidNumberError();
            }
        }
        // PhoneValidator constructo end

        // EmailValidator constructor start
        function EmailValidator(selector, id) {
            Validator.call(this, selector, id);
            this.type = 'email';
        };
        EmailValidator.prototype = Object.create(Validator.prototype);
        EmailValidator.prototype.constructor = EmailValidator;
        EmailValidator.prototype.validateEmail = function() {
            if(this.filled()) { //if its filed check for if its valid email
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(re.test(this.value.toLowerCase())) {
                  return true;
                } else {
                  this.showInvalidEmailError();
                  return false;
                }
            }
        };
        EmailValidator.prototype.showInvalidEmailError = function() {
            $(this.selector).find('.invalid-email').removeClass('invalid-email_hidden').addClass('invalid-email_visible');
        };
        EmailValidator.prototype.hideInvalidEmaiError = function() {
            $(this.selector).find('.invalid-email').removeClass('invalid-email_visible').addClass('invalid-email_hidden');
        }
        // EmailValidator constructor end

        // NonRequiredValidator constructor start
        function NonRequiredValidator(selector, id){
            Validator.call(this, selector, id);
            this.type = 'Not required';
        }
        NonRequiredValidator.prototype = Object.create(Validator.prototype);
        NonRequiredValidator.prototype.constructor = NonRequiredValidator;
        // NonRequiredValidator constructor end

        function form(id){

            var validatorsArray = []; //Array which will holds all validators then wel iterate over it and apply all we need
            var nameInput = new Validator('.js-name-input', id);
            var phoneInput = new PhoneValidator('.js-phone-input', id);
            var messageInput = new NonRequiredValidator('.js-message-input', id);
            var emailInput = new EmailValidator('.js-email-input', id);
            var submitBtn = $( id + ' .js-submit-button');
            validatorsArray.push(nameInput);
            validatorsArray.push(phoneInput);
            if(id==='#form_main') {
                validatorsArray.push(messageInput);
            } else {
                validatorsArray.push(emailInput);
            }

            // This function checks if both inputs are valid and then removes or adds disabled to submit button
            function activateSubmitBtn() {
                if(nameInput.valid && phoneInput.valid) {
                    submitBtn.removeClass('js-submit-button_disabled');
                } else {
                    submitBtn.addClass('js-submit-button_disabled');

                }
            };

            validatorsArray.forEach(function(validator, index) {

                $(validator.selector).on('keyup', function() {
                    validator.update();
                    validator.hideEmptyInputError();
                    if(validator.type === "phone") {
                        validator.hideInvalidNumberError();
                    }
                    if(validator.type === "email") {
                        validator.hideInvalidEmaiError();
                    }
                    validator.validate();
                    activateSubmitBtn();
                }); // Event listener for keyup to update values and remove errormessages

                $(validator.selector).find('.clear-input').on('click', function() {
                    validator.clearInput();
                    validator.update();
                    validator.validate();
                    activateSubmitBtn();
                    $(validatorsArray[index].selector).find('.input-box__field').focus();
                }); // Event lsitener for cick on X to clear field

                $(validator.selector).on('keydown', function(e) {
                    var code = (e.keyCode ? e.keyCode : e.which);
                    if(code === 13) {
                        e.preventDefault();
                        if(validatorsArray[index+1]) {
                            $(validatorsArray[index+1].selector).find('.input-box__field').focus();
                        } else {
                            $('.js-submit-button').focus();
                        }
                    }

                }); // Event listener to move cursor by pressing enter
            });

            $(id).submit(function(event) { //устанавливаем событие отправки для формы с id=form
                event.preventDefault();

                validatorsArray.forEach(function(validator, index) {
                    validator.update();
                    validator.validate();
                });

                var form_data = $(this).serialize(); //собераем все данные из формы

                if(nameInput.valid && phoneInput.valid) {
                    $.ajax({
                        type: "POST", //Метод отправки
                        url: "/includes/application.php", //путь до php фаила отправителя
                        data: form_data,
                        success: function(dat) {

							var lang=document.getElementsByTagName('html')[0].getAttribute('lang');
							if (lang=='uk') {
								lang='';
							}
							else{
								lang='/'+lang;
							}

						    data= $.parseJSON(dat);
							if (data.result){
								if (data.page !== undefined) {
									window.location = lang+data.page;
								}
							}
							else{
											 //код в этом блоке выполняется при успешной отправке сообщения
											$('.form').animate({opacity: 0, top: '10%'}, 1, function(){
												$(this).css('display','none');
												$('.overlay').fadeOut(1);
											});
											$('.overlay').fadeIn(300, function(){
												$('.form-ok').css('display','block').animate({opacity: 1, top: '10%'}, 200);
											})
											$('form input[name="name"], form input[name="email"], form input[name="tel"], form textarea').val('');
											$('#contactForm').css ({
												display: 'none'
											});
											$('.form').css ({
												display: 'none'
											});
											$('.overlay').css ({
												display: 'none'
											})

							}

                        }
                    });
                } else {
                    console.log('Invalid form data');
                }
            });
        }

    //============= Mask and international number start ========

(function($) {

    $.fn.scrollPagination = function(options) {

        var settings = {
            nop     : 5, // Количество запрашиваемых из БД записей
            offset  : 0, // Начальное смещение в количестве запрашиваемых данных
            count  : 0,
            lang  : '',
            error   : 'Записей больше нет!', // оповещение при отсутствии данных в БД
            add: 'Показать больше',
            loading: 'Loading...',
            delay   : 500, // Задержка перед загрузкой данных
            scroll  : true, // Если true то записи будут подгружаться при прокрутке странице, иначе только при нажатии на кнопку
            page: ''
        }

        // Включение опции для плагина
        if(options) {
            $.extend(settings, options);
        }

        return this.each(function() {

            $this = $(this);
            $settings = settings;
            var offset = $settings.offset;
            var count = $settings.count;
            var busy = false; // переменная для обозначения происходящего процесса

            // Текст кнопки, на основе параметров
            if($settings.scroll == true) $initmessage = $settings.add;
            else $initmessage = 'Кликни';

            $this.append('<div class="ajax__news"></div><div class="loading-bar">'+$initmessage+'</div>');

            // Функция AJAX запроса
            function getData() {

                // Формируется POST запрос к ajax.php
                $.post('/includes/ajax.php', {

                    action        : 'scrollpagination',
                    number        : $settings.nop,
                    offset        : offset,
                    count         : count,
                    lang          : $settings.lang,
                    page          : $settings.page

                }, function(data) {

                    // Информируем пользователя
                    $this.find('.loading-bar').html($initmessage);
                    //console.log(data);
                    // Если возвращенные данные пусты то сообщаем об этом

                    if( count<=offset) {
                        $this.find('.loading-bar').html($settings.error);
                    }
                    else {

                        // Смещение увеличивается
                        offset = offset+$settings.nop;

                        // Добавление полученных данных в DIV ajax__news
                           $this.find('.ajax__news').append(data);

                        // Процесс завершен
                        busy = false;
                    }

                });

            }

            getData(); // Запуск функции загрузки данных в первый раз

            // Если прокрутка включена
            if($settings.scroll == true) {
                // .. и пользователь прокручивает страницу
                $(window).scroll(function() {

                    // Проверяем пользователя, находится ли он в нижней части страницы
                    if($(window).scrollTop() + $(window).height() > $this.height() && !busy) {

                        // Идет процесс
                        busy = true;

                        // Сообщить пользователю что идет загрузка данных
                        $this.find('.loading-bar').html($settings.loading);

                        // Запустить функцию для выборки данных с установленной задержкой
                        // Это полезно, если у вас есть контент в футере
                        setTimeout(function() {

                            getData();

                        }, $settings.delay);

                    }
                });
            }

            // конент загружен нажатием на кнопку
            $this.find('.loading-bar').click(function() {

                if(busy == false) {
                    busy = true;
                    getData();
                }

            });

        });
    }

})(jQuery);

//Для форм
var ct = 0;
var addCount = document.createElement('input');
addCount.type = "hidden";
addCount.id = "count";
addCount.name = "count";
addCount.value = "0";
function countme(form) { var form;
	document.getElementById(form).appendChild(addCount);
	document.getElementById('count').value = ++ct;
}
