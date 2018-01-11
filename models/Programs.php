<?php

class Programs
{
	/**
	 * Returns Singl News Item with $id
	 * @param integer $id
	 */

	public static function getProgramsList()
	{
		$db = Db::getConnection();

		$result = $db->query('SELECT * FROM `programs` ORDER BY `id` DESC');
		$programs = $result->fetchAll();
		
		return $programs;
	}


	public static function getProgramByTitle($title)
	{
		$db = Db::getConnection();

        $result = $db->query("
			SELECT * FROM `programs` 
			WHERE `programs`.`title` = '" . $title . "'
			");
        $program = $result->fetchAll();

        return $program;
    }

    public static function showProgramType($type)
    {
    	// take number of type from MySQL
    	// return program_type(string)
    	switch ($type) {
    		case '1':
    			return 'Тренировки и питание';
    			break;
    		
    		case '2':
    			return 'Только тренировки';
    			break;

    		case '3':
    			return 'Только питание';
    			break;
    			
    		default:
    			return 'Не определен';
    			break;
    	}
    }

    public static function delProgramById($id)
    {
    	$db = Db::getConnection();

    	$id = intval($id);

        $count = $db->exec("
			DELETE FROM `programs` WHERE `programs`.`id` = $id
			");

        /* Получим количество удаленных записей */
		// print("Удалено записей - $count\n");

        return true;
    }

    public static function addNewProgram($params)
    {
    	$db = Db::getConnection();

    	$title = $params['title'];
    	$description = $params['description'];
    	$type = $params['type'];
    	$duration = $params['duration'];
    	$reports = $params['reports'];

    	foreach ($params as $key => $value) {
    		$_SESSION['programs'][$key] = $value;
    	}

    	foreach ($_SESSION['programs'] as $value) {
    	    if (!$value) {
    			print('Ошибка: должны быть заполнены все поля!');
    			return;
    		}
    	}

    	$uniqueTitle = self::getProgramByTitle($title);
    	// $errMsg()
    	if ($uniqueTitle) {
    		print('Ошибка: такое название программы уже есть!');
    		return;
    	}
    	// print('Ошибки нет');

        $result = $db->prepare("
			INSERT INTO `programs` (`id`, `title`, `description`, `type`, `duration`, `reports`) 
			VALUES (NULL, :title, :description, :type, :duration, :reports)
			");

        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
        $result->bindParam(':type', $type, PDO::PARAM_INT);
        $result->bindParam(':duration', $duration, PDO::PARAM_INT);
        $result->bindParam(':reports', $reports, PDO::PARAM_INT);
        $result->execute();

        unset($_SESSION['programs']);

        return true;
    }


    // public static function ifIssetValue($val)
    // {
    // 	if (isset($_SESSION['programs'][$val])) echo $_SESSION['programs'][$val];
    // }
}