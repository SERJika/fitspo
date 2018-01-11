$db = Db::getConnection();

        	$result = $db->prepair('SELECT * FROM `admin_tab` ORDER BY `id` DESC');
        	$result->bindParam(':groupNumb', $groupNumb, PDO::PARAM_STR);
        	$result->execute();