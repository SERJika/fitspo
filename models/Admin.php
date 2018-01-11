<?php

class Admin
{

	public static function getAdmin()
	{
		// $db = Db::getConnection();

		// $result = $db->query('
		// 	SELECT * FROM `reports`
		// ');
		// $group = $result->fetchAll();
		$adminName = 'Вика';

		return $adminName;
	}
}