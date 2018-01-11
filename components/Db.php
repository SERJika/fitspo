<?php

class Db
{
	public static function getConnection()
	{
		$param = include(BASE_DOMAIN . '/config/db_param.php');

		try {
    		$db = new PDO("mysql:host={$param['db_host']};charset={$param['db_charset']};dbname={$param['db_name']}", $param['db_user'], $param['db_pass'], $param['db_opt']);
    		$db->query("SET time_zone = 'Europe/Moscow'");
		} catch(PDOException $e) {
		    die('<br /><br />Сайт временно не доступен: проводятся технические работы');
		}

		return $db;
	}
}