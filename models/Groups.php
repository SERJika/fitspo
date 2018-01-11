<?php

class Groups
{
	/**
	 *  Returns the array of the Groups
	 */
	public static function getGroupsList()
	{
		$db = Db::getConnection();

		$result = $db->query('
			SELECT g.id, g.numb, g.start, g.finish, pr.title 
			FROM `groups` AS g
			LEFT JOIN `programs` AS pr
			ON g.progID = pr.id
			ORDER BY `start` DESC');
		$groupsList = $result->fetchAll();

		$groupsList = Common::transformGroupDate($groupsList);

		return $groupsList;
	}

	/**
	 * Returns Singl News Item with $id
	 * @param integer $id
	 */
	public static function getGroupByNumb($numb)
	{
		$db = Db::getConnection();

		$result = $db->query('
			SELECT g.id, g.numb, g.start, g.finish, pr.title
			FROM `groups` AS g
			LEFT JOIN `programs` AS pr
			ON g.progID = pr.id
			WHERE `numb`=' . $numb
		);
		$group = $result->fetchAll();

		if (!$group) {
			header('Location: ' . THE_DOMAIN . 'groups');
		}
		
		$getGroup = Common::transformGroupDate($group);

		return $getGroup['0'];
	}

	public static function getNewGroup()
	{
		$maxNumb = self::getMaxGroupNumber();
		$group['id'] = null;
		$group['numb'] = $maxNumb + 1;
		$group['title'] = 'Программа не выбрана';
		$group['start'] = '';
		$group['finish'] = '';

		return $group;
	}

	public static function getMaxGroupNumber()
	{
		$db = Db::getConnection();

		$result = $db->query('
			SELECT * 
			FROM groups
			WHERE numb IS NOT NULL 
			ORDER BY id DESC 
			LIMIT 1');
		$group = $result->fetchAll();

		if (!$group) {
			return false;
		} else {
			return $group['0']['numb'];
		}
	}


	// public static function getMembersIn()
	// {
		// $numb_of_groups = count($groupsList);

		// $result = $db->query('SELECT * FROM `members` ORDER BY `in_group` ASC');
		// $members_of_group = $result->fetchAll();
		
		// $arrGroups = [];
		// foreach ($members_of_group as $value) {
		// 	$in_group = $value['in_group'];
		// 	if (!isset($arrGroups[$in_group])) {
		// 		$arrGroups[$in_group] = 1;
		// 	} else {
		// 		$arrGroups[$in_group] += 1;
		// 	}
		// }
		// $groupsList['groups'] = $arrGroups;

		// return $groupsList;

	// }




	public static function UpdateGroupAjax($id, $param)
	{
		$db = Db::getConnection();

        $numb = $param['numb'];
        $title = $param['program'];
        $start = $param['start'];
        $status = $param['status'];
        
        $result = $db->query('
			SELECT `id`, `duration`
			FROM `programs`
			WHERE `title` = "' . $title . '"
		');
		$program = $result->fetchAll();
		$prodDur = $program['0']['duration'];
		$progID = $program['0']['id'];

		$date = explode('.', $start);
		$finish = date("d.m.Y", mktime(0, 0, 0, $date['1'], $date['0'], $date['2']) + ($prodDur * 24 * 60 * 60) );
		$finish = Common::dateToStr($finish);
		$start = Common::dateToStr($start);

		if ($status == 'oldgr') {

			$result = $db->prepare("
				UPDATE `groups` 
				SET `progID` = :progID,
					`start`  = :start,
					`finish` = :finish 
				WHERE `groups`.`numb` = :numb
			");
		} else {

			$result = $db->prepare("
				INSERT INTO `groups` (`id`, `numb`, `progID`, `start`, `finish`) 
				VALUES (NULL, :numb, :progID, :start, :finish)
			");
		}

		$result->bindParam(':numb', $numb, PDO::PARAM_INT);
		$result->bindParam(':progID', $progID, PDO::PARAM_INT);
		$result->bindParam(':start', $start, PDO::PARAM_STR);
		$result->bindParam(':finish', $finish, PDO::PARAM_STR);
		$result->execute();
		
		$showUpdateGroup = self::getGroupByNumb($numb);

		return $showUpdateGroup;
	}
	
	// public static function addNewGroup($id, $param)
	// {
	// 	$db = Db::getConnection();

 //        $numb = $param['numb'];
 //        $title = $param['program'];
 //        $start = $param['start'];
        
 //        $result = $db->query('
	// 		SELECT `id`, `duration`
	// 		FROM `programs`
	// 		WHERE `title` = "' . $title . '"
	// 	');
	// 	$program = $result->fetchAll();
	// 	$prodDur = $program['0']['duration'];
	// 	$progID = $program['0']['id'];

	// 	$date = explode('.', $start);
	// 	$finish = date("d.m.Y", mktime(0, 0, 0, $date['1'], $date['0'], $date['2']) + ($prodDur * 24 * 60 * 60) );
	// 	$finish = Common::dateToStr($finish);
	// 	$start = Common::dateToStr($start);

	// 	$result = $db->prepare("
	// 		UPDATE `groups` 
	// 		SET `progID` = :progID,
	// 			`start`  = :start,
	// 			`finish` = :finish 
	// 		WHERE `groups`.`numb` = :numb
	// 	");
		
 //            $result->bindParam(':numb', $numb, PDO::PARAM_INT);
 //            $result->bindParam(':progID', $progID, PDO::PARAM_INT);
 //            $result->bindParam(':start', $start, PDO::PARAM_STR);
 //            $result->bindParam(':finish', $finish, PDO::PARAM_STR);
 //            $result->execute();
            
 //            $updateGroup = self::getGroupByNumb($numb);

 //            return $updateGroup;
	// }

	public static function getProgDuration()
	{
		$db = Db::getConnection();

		$result = $db->query("
			SELECT title, duration
			FROM programs
		");
		$dur = $result->fetchAll();
		
		foreach ($dur as $key => $value) {
			$duration[$value['title']] = $value['duration'];
		}

		return $duration;
	}

	public static function delGroup($numb)
	{
		$db = Db::getConnection();

		$result = $db->prepare("
			DELETE FROM `groups`
			WHERE `groups`.`numb` = :numb
		");
		$result->bindParam(':numb', $numb, PDO::PARAM_INT);
		$result->execute();
		return $result;
	}
}