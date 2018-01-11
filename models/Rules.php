<?php

class Rules
{

	public static function getRulesList()
	{
		$db = Db::getConnection();

		 $rules = '';

        // $result = $db->query('
        //     SELECT m.id, m.name, m.surname, m.avatar, m.program, m.inGroup, g.start, g.finish, pr.title
        //     FROM `rules` AS r
        //     LEFT JOIN  `groups` AS g
        //     ON m.inGroup = g.numb
        //     LEFT JOIN `programs` AS pr
        //     ON m.program = pr.id
        //     ORDER BY m.activationDate DESC
        // ');

        // $members = $result->fetchAll();
        // $members = Common::cleanArr2x($members);

		return $rules;
	}

	public static function getFAQ()
	{
		$db = Db::getConnection();

		 $faq = '';

        // $result = $db->query('
        //     SELECT m.id, m.name, m.surname, m.avatar, m.program, m.inGroup, g.start, g.finish, pr.title
        //     FROM `rules` AS r
        //     LEFT JOIN  `groups` AS g
        //     ON m.inGroup = g.numb
        //     LEFT JOIN `programs` AS pr
        //     ON m.program = pr.id
        //     ORDER BY m.activationDate DESC
        // ');

        // $members = $result->fetchAll();
        // $members = Common::cleanArr2x($members);

		return $faq;
	}

	public static function getTrainingRecomendations()
	{
		$db = Db::getConnection();

		 $trainRecom = '';

        // $result = $db->query('
        //     SELECT m.id, m.name, m.surname, m.avatar, m.program, m.inGroup, g.start, g.finish, pr.title
        //     FROM `rules` AS r
        //     LEFT JOIN  `groups` AS g
        //     ON m.inGroup = g.numb
        //     LEFT JOIN `programs` AS pr
        //     ON m.program = pr.id
        //     ORDER BY m.activationDate DESC
        // ');

        // $members = $result->fetchAll();
        // $members = Common::cleanArr2x($members);

		return $trainRecom;
	}

	public static function getNutrilonRecomendations()
	{
		$db = Db::getConnection();

        $result = $db->query('
            SELECT `nutrilon`
            FROM `recomendations`
        ');

        $nutrilon = $result->fetchAll();

		return $nutrilon[0]['nutrilon'];
	}

	public static function setNutrilonRecomendations($html)
	{
		$db = Db::getConnection();

        $result = $db->prepare('
                UPDATE `recomendations`
                SET `nutrilon` = :nutrilon
            ');
            $result->bindParam(':nutrilon', $html, PDO::PARAM_STR);
            $result->execute();

            $key = '';

		return $key;
	}

	public static function getNutrilonSportRecomendations()
	{
		$db = Db::getConnection();

        $result = $db->query('
            SELECT `nutrilonsport`
            FROM `recomendations`
        ');

        $nutrilonSport = $result->fetchAll();

		return $nutrilonSport[0]['nutrilonsport'];
	}

	public static function setNutrilonSportRecomendations($html)
	{
		$db = Db::getConnection();

        $result = $db->prepare('
                UPDATE `recomendations`
                SET `nutrilonSport` = :nutrilon
            ');
            $result->bindParam(':nutrilon', $html, PDO::PARAM_STR);
            $result->execute();

            $key = '';

		return $key;
	}

}