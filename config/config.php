<?php

# Development
ini_set('display_errors', 'On');
ini_set('idisplay_startup_errors', 'On');
ini_set('error_reporting', '-1');
ini_set('log_errors', 'On');

# Production
// ini_set('display_errors', 'Off');
// ini_set('display_startup_errors', 'Off');
// ini_set('error_reporting', 'E_ALL');
// ini_set('log_errors', 'On');


//setlocale(LC_ALL, 'ru_RU.UTF8');
mb_internal_encoding("UTF-8");
mb_regex_encoding("UTF-8");




// define('THE_DOMAIN', 'http://admin.newyorkfitspo.ru/');
// define('USER_DOMAIN', 'http://lk.newyorkfitspo.ru/');

define('THE_DOMAIN',  'http://fitspo.local/');    // ========= USER VS ADMIN ??? =========
define('USER_DOMAIN', 'http://lk_fitspo.local/'); // ========= USER VS ADMIN ??? =========
define('IMG_UPLOADS',  '/Applications/XAMPP/xamppfiles/htdocs/vm_projects/fitspo_uploads/');//   BASE_DOMAIN . '/template/img/members/');
define('VIEWS_DIR',   'http://fitspo.local/views/');




//define('FPDF_FONTPATH','/template/fonts/pdf_fonts/'); 

// date_default_timezone_set('UTC');
// if (function_exists('date_default_timezone_set'))
date_default_timezone_set('Europe/Moscow'); // warning
//date_default_timezone_set('Etc/GMT+3');
define('STAMP_OF_DATE', date("d-m-Y"));
define('STAMP_OF_TIME', date("H-i-s"));
define('STAMP_OF_DATE_AND_TIME', date("d-m-Y__H-i-s"));

$admin_mail_1 = 'mailbox.spb@bk.ru';
$admin_mail_2 = '';


define('ALLOWED_FILE_SIZE', 5000000);
// ЗАГРУЗКА ФАЙЛОВ: Разрешенные расширения файлов.
// define('FILES_ALLOWED', array(
// 	'jpg', 'jpeg', 'png'
// );

// // ЗАГРУЗКА ФАЙЛОВ: Запрещенные расширения файлов.
// define('FILES_DENIED', array(
//     'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
//     'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
//     'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi'
// );