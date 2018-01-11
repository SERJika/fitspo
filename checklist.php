<?php

Профили участниц

0 = новая регистрация, доступ только к заполнению анкеты
1 = новая регистрация, анкета отправлена, ожидание
2 = статус активный, доступ ко всем разделам


роуты настроить у админа - стр 404

при регистрации записывать ид в таблицу авторизации

при повторной отправке анкеты профиль менять на 0











// $to = 'ser.tellme@gmail.com';
// $to .= ',';

// $from = 'myspb78.ru';//info@fidelisway-centre.ru';

// $eol = "\r\n";

// // $boundary = md5(uniqid(time()));
// $header  = 'From: '.$from.$eol;
// $header .= 'Reply-To: '.$from.$eol;
// // $header .= 'MIME-Version: 1.0'.$eol;
// // $header .= 'Content-Type: multipart/mixed; boundary="' . $boundary . '"' . $eol;
// // $header .= 'X-Mailer: PHP v'.phpversion().$eol;
// // $body  = 'This is a multi-part message in MIME format.'. $eol . $eol;
// // $body .= '--'.$boundary.$eol;
// $header .= 'Content-Type: text/plain; charset=utf-8'. $eol;
// $header .= 'Content-Transfer-Encoding: 8bit'.$eol;

// $theme = 'test ' . date("Y-m-d H:i:s");
// $text  = 'test my CronoTab on ' . date("Y-m-d H:i:s");

// $message .= 'Сообщение: ' . $text . $eol;

// $letter .= $eol . stripslashes($message) . $eol;
// // $letter .= '--' . $boundary . '--' . $eol;

// mail($to, $subject, $letter, $header);

// // echo($theme.'-'.$phone.'-'.$letter.'='.$sendTo .'-'. $subject.'-'. $letter.'-'. $header)


