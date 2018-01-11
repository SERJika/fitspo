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

define('THE_DOMAIN', 'http://admin.newyorkfitspo.ru/');
define('USER_DOMAIN', 'http://lk.newyorkfitspo.ru/');

// date_default_timezone_set('UTC');
// if (function_exists('date_default_timezone_set'))
date_default_timezone_set('Europe/Moscow');


$admin_mail_1 = 'mailbox.spb@bk.ru';
$admin_mail_2 = '';