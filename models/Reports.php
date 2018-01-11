<?php

class Reports
{

	public static function getNewReports()
	{
		// $db = Db::getConnection();

		// $result = $db->query('
		// 	SELECT * FROM `reports`
		// ');
		// $group = $result->fetchAll();
		$reportsNew = [0,1,2,3];

		return $reportsNew;
	}

	public static function getLostReports()
	{
		// $db = Db::getConnection();

		// $result = $db->query('
		// 	SELECT * FROM `reports`
		// ');
		// $group = $result->fetchAll();
		$reportsLost = [1,2];

		return $reportsLost;
	}
}