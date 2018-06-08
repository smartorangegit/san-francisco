<?php
print_r($_POST);
if((isset($_POST['fio'])&&$_POST['fio']!="")&&(isset($_POST['phone'])&&$_POST['phone']!="")&&(isset($_POST['email'])&&$_POST['email']!="")){ //Проверка отправилось ли наше поля name и не пустые ли они
        $to = 'sanfranciscocomua@i.ua'; //Почта получателя, через запятую можно указать сколько угодно адресов
        $subject = 'Обратный звонок'; //Загаловок сообщения
        $message = '
                <html>
                    <head>
                        <title>'.$subject.'</title>
                    </head>
                    <body>
                        <p>Имя: '.$_POST['fio'].'</p>
                        <p>Телефон: '.$_POST['phone'].'</p>
			<p>Телефон: '.$_POST['email'].'</p>                         
                    </body>
                </html>'; //Текст нащего сообщения можно использовать HTML теги
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        $headers .= "From: Отправитель <san.com.ua>\r\n"; //Наименование и почта отправителя
        mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail
}
//header('Location: ../comingsoon/');
