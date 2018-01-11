<?php

class Edit
{
	/**
	 * Returns star page dashbord.php
	 * @param 
	 */

    public static function getAdminById($id)
    {
        $db = Db::getConnection();

    	$result = $db->prepair('SELECT * FROM `admin_tab` WHERE `id` = :id');
        $result->bindParam(':id', $_SESSION['admin'], PDO::PARAM_INT);
        $result->execute();

        $admin = $result['0'];

        return $admin;
    }

    
    // public static function checkLogin()
    // {
        
    //     if (isset($_SESSION['user'])) {
    //         return $_SESSION['user'];
    //     }
    //     //header('Location: /entrance');
    //     return false;
    // }
    

    public static function checkEdit($param)
    {
        // echo('check edit');
        $email  = Common::cleanVar($param['email']);
        $pass   = Common::cleanVar($param['pass']);
        $ip     = Common::cleanVar($_SERVER['REMOTE_ADDR']);
        $errors = false;

        // if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) { 
        //     $errors[] = 'Введен некорректный email';
        // }
        $db = Db::getConnection();

        $result = $db->prepare('
            SELECT `id`, `hash`, `attempts`, `allowed_time` 
            FROM `admin_tab` 
            WHERE `email` = :email
        ');
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $result  = $result->fetchAll();
        
        if ($result) {
            $result = $result['0'];
            $checkPass = (password_verify($pass, $result['hash']));
            if ($checkPass) {
            //if (1) {
                $_SESSION['user'] = $result['id'];
            }
        }

        if ( !$result || !$checkPass) { 
            $error = 1;
        } else {
            $error = 0;
        }

        return $error;
    }
    

    public static function createAccAjax()
    {
        $db = Db::getConnection();

        $email =  Common::cleanVar($_POST['email']);
        $pass  =  Common::cleanVar($_POST['pass']);
        $pass2 =  Common::cleanVar($_POST['pass2']);

//echo $email . "\r\n";
        if ($pass != $pass2) {
            $msg = '<p style="color: red;">Введенные пароли не совпадают</p>';
            return print($msg);
        }

        $hash = password_hash($pass, PASSWORD_DEFAULT);

        $ip = $_SERVER['REMOTE_ADDR'];

        $result = $db->prepare("
            INSERT INTO `admin_tab` (`id`, `name`, `surname`, `email`, `hash`, `ip`, `edit_time`) 
            VALUES (NULL, 'Вика', '', :email, :pass, :ip, CURRENT_TIMESTAMP)
        ");
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':pass', $hash, PDO::PARAM_STR);
        $result->bindParam(':ip', $ip, PDO::PARAM_STR);
        $result->execute();

        $msg = '<p style="color: green;">Ргистрация прошла успешно!</p>';

        return print($msg);
    }
}
    
//     public static function example()

//         // echo '111111111111';
//         // print($login == 'fitspo' || $login == 'Fitspo');
//         if ($login == 'fitspo' || $login == 'Fitspo') {
//                     // echo '--if--</br />';
//             $data = self::checkEditAdmin();
//             $getLogin = 'fitspo';
//             $getHash = $data['hash'];
//         } else {
//                // echo '--else--</br />';
//             $data = self::checkEditMember();
//             $getLogin = $data['login'];
//             $getHash = $data['hash'];
//         }
//    // echo '--pre--</br />';
//         if ($login != $getLogin) {
//             $msg = '<p style="color: red;">Нет пользователя с таким логином</p>';
//             return $msg;
//         }
// // echo '22222222222222222';
//         // $pass = password_hash($pass, PASSWORD_DEFAULT);
//         $check = (password_verify($pass, $getHash));
//         //echo $check;

//         if ( !$check ) {
//             $db = Db::getConnection();
//             $attempt = intval($data['attempts']);
//             $attempt++;
//             $result = $db->prepare("
//                 UPDATE `admin_tab` 
//                 SET `edit_time`= CURRENT_TIMESTAMP,
//                     `attempts` = :attempt
//                 WHERE `id` = 60
//             "); 
//             $result->bindParam(':attempt', $attempt, PDO::PARAM_INT);
//             $result->execute();

//             $msg = '<p style="color: red;">Пароль не верный</p>';
//             return $msg;
//         }

//         $msg = '<p style="color: green;">Авторизация прошла успешно!</p>';

//         return $msg;
//     }

//     public static function checkEditAdmin()
//     {
//         $db = Db::getConnection();
// // echo '33333333333333333';
//         $result = $db->prepare("
//             SELECT `hash`, `attempts`, `allowed_time` 
//             FROM `admin_tab` 
//             WHERE `id` = 10
//         ");
//         $result->execute();
//         $data = $result->fetchAll();

//         $data = $data['0'];
//         $attempt = $data['attempts'];
//         $alwdTime = $data['allowed_time'];
//         $hash = $data['hash'];
//         $today = date("Y-m-d H:i:s");

//         echo '<br />$attempt ='.$attempt .'<br />';

//         if ($attempt < 6 && $alwdTime < $today) {
// echo '44444444444<br />';
//             return $data;

//         } else {
// echo '5555555555555<br />';
//             $alwdTime = strtotime("+15 minutes");
//             $alwdTime = date("Y-m-d H:i:s", $alwdTime);

//             // echo 'time='.$alwdTime.'<br />';
//             // $tomorrow = date('m-d-Y',strtotime($date1 . "+1 days"));
//             $result = $db->prepare("
//                 UPDATE `admin_tab` 
//                 SET `allowed_time` = :alwdTime,
//                     `attempts` = 0
//                 WHERE `id` = 10
//             ");
//             $result->bindParam(':alwdTime', $alwdTime, PDO::PARAM_STR);
//             $result->execute();

//             return false;
//         }
//     }
