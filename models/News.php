<?php

class News
{
	/**
	 * Returns Singl News Item with $id
	 * @param integer $id
	 */

	public static function getNewsItemById($id)
	{
		// Request to DB
		require_once(BASE_DOMAIN . '/components/Db.php');
		$db = Db::getConnection();

		$result = $db->query('SELECT * FROM news WHERE id=' . $id);
		$newsItem = $result->fetchAll();
		
		return $newsItem;
	}

	/**
	 *  Returns the array of the News Item
	 */

	public static function getNewsList()
	{
		// Request to DB
		require_once(BASE_DOMAIN . '/components/Db.php');
		$db = Db::getConnection();

		$result = $db->query('SELECT id, title, date, short_content, author_name FROM news ORDER BY date DESC LIMIT 10');
		$newsList = $result->fetchAll();
		
		return $newsList;

	}
}