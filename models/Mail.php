<?php

class Mail
{
    public static function sendQuestionnaire($id, $params)
    {
    	$db = Db::getConnection();
        $result = $db->prepare("
            UPDATE `members`
            SET `profile` = 0
			WHERE `id` = :id
        ");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();


        $result = $db->prepare("
            SELECT `name`, `surname`, `email`, `hash`, `exp` 
            FROM `user_tab` 
            WHERE `user_id` = :userID
            ");
        $result->bindParam(':userID', $id, PDO::PARAM_INT);
        $result->execute();
        $result = $result->fetchAll();
        $user = $result['0'];


    	$name = ( isset( $params['name']) && $params['name'] != '' ) ? $params['name'] : 'новая участница';
    	$email = $params['email'];

        $to      = $email;
        // multiple recipients
$to .= ', '; // note the comma
$to .= 'mailbox.spb@bk.ru';

		$subject = 'Сообщение с сайта "Fitspo"';

		// $message = "Поздравляю, " . $name . "!\r\n";
		// $message .= "Для тебя создан личный кабинет на сайте Fitspo: в нем ты будешь получать задания по тренировке и питанию, заполнять отчеты.\r\n";
		// $message .= "\r\nПрежде чем начать курс тренировок\r\n";
		// $message .= "зарегистрируйся в кабинете и заполни анкету, перейдя по ссылке\r\n";
		// $message .= THE_DOMAIN . 'questionnaire/profile-' . $id;
		// $message .= "\r\nПосле того как тренер посмотрит анкету и назначит тебе упражнения, тебе будет открыт доступ ко всем разделам твоего кабинета\r\n";
		// $message .= "\r\nС уважением, \r\nВиктория";

        $message = "Поздравляю, " . $name . "!\r\n";
        $message .= "Ты приняла важное и ответственное решение работать над собой.\r\n";
        $message .= "\r\nПрежде чем начать курс тренировок\r\n";
        $message .= "заполни анкету, перейдя по ссылке\r\n";
        $message .= USER_DOMAIN . 'questionnaire';
        $message .= "\r\nДанные для входа\r\n";
        $message .= "Логин: " . $user['email'];
        $message .= "\r\nПароль: " . $user['exp'] . "\r\n";
        $message .= "\r\nПосле того как тренер посмотрит анкету и назначит тебе упражнения, тебе будет открыт доступ ко всем разделам твоего кабинета\r\n";
        $message .= "\r\nС уважением, \r\nВиктория";
 
		mail($to, $subject, $message);
        //mail('mailbox.spb@bk.ru', $subject, $message);


        return true;
    }

}