<?php

class Members
{
	/**
	 * Returns Singl News Item with $id
	 * @param integer $id
	 */

    public static function getMembersList()
    {
        $db = Db::getConnection();

        $result = $db->query('
            SELECT m.id, m.name, m.surname, m.avatar, m.program, m.inGroup, g.start, g.finish, pr.title
            FROM `members` AS m
            LEFT JOIN  `groups` AS g
            ON m.inGroup = g.numb
            LEFT JOIN `programs` AS pr
            ON m.program = pr.id
            ORDER BY m.activationDate DESC
        ');

        $members = $result->fetchAll();
        $members = Common::cleanArr2x($members); 
        
        return $members;
    }

    public static function getMemberById($id)
    {
        $db = Db::getConnection();

        $result = $db->prepare("
            SELECT * 
            FROM `members` AS m 
            LEFT JOIN `groups` AS g
            ON m.inGroup = g.numb
            LEFT JOIN `personCard` AS p
            ON m.id = p.memberID
            LEFT JOIN `programs` AS pr
            ON m.program = pr.id
            WHERE m.id = :id
        ");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $member = $result->fetchAll();
        $member['0']['id'] = $id;
        if (!$member) {
            header('Location: ' . THE_DOMAIN . 'members');
        }
        
        return $getMember = $member['0'];//Common::getCorrectDate($member['0']);
    }

    // public static function getCorrectDate($member)
    // {
    //     $member['start'] = Common::strToDate($member['start']);
    //     $member['finish'] = Common::strToDate($member['finish']);

    //     return $member; 
    // }

    public static function getAvatar($member)
	{
        if ($member['avatar'] == '') {
            $avatar = '<i class="material-icons user-icon">face</i>';
        } else {
            $avatar = '<img src="' . THE_DOMAIN . 'template/img/members/' 
                      . $member['id'] . '/' . $member['avatar'] 
                      . '" alt="' . $member['name'] 
                      . ' ' . $member['surname'] . '">';
        }
        return $avatar;
    }

    public static function getAvatarByID($id)
    {
        $db = Db::getConnection();

        $result = $db->prepare("
            SELECT `avatar`
            FROM `members` AS m
            WHERE m.id = :id
        ");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $member = $result->fetchAll();
        $avatar = $member['0']['avatar'];

        if ($avatar == '') {
            $avatar = THE_DOMAIN . 'template/img/members/noavatar.png';
        } else {
            $avatar = THE_DOMAIN . 'template/img/members/' . $id . '/' . $avatar;
        }
        return $avatar;
    }

    public static function getBackFaceByID($id)
    {
        $db = Db::getConnection();

        $result = $db->prepare("
            SELECT `avatar`
            FROM `members` AS m
            WHERE m.id = :id
        ");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $member = $result->fetchAll();
        $avatar = $member['0']['avatar'];

        if ($avatar == '') {
            $avatar = THE_DOMAIN . 'template/img/members/noavatar.png';
        } else {
            $avatar = THE_DOMAIN . 'template/img/members/' . $id . '/' . $avatar;
        }
        return $avatar;
    }

    public static function getMembersOutOfGroup()
    {
        $db = Db::getConnection();

        $result = $db->query('
            SELECT m.id, m.name, m.surname, m.avatar, m.inGroup, pr.title
            FROM `members` AS m
            LEFT JOIN `programs` AS pr
            ON m.program = pr.id
            WHERE `inGroup` = 0 
        ');
        $members_out_of_group = $result->fetchAll();

        return $members_out_of_group;
    }

    public static function getMembersInGroup($numb)
    {
        // $db = Db::getConnection();
        // $result = $db->query("
        //     SELECT * 
        //     FROM `members` 
        //     WHERE `inGroup` = '".$numb."'
        //     ORDER BY `addGrTime` DESC
        // ");
        $db = Db::getConnection();
        $result = $db->prepare("
            SELECT * 
            FROM `members` 
            WHERE `inGroup` = :numb
            ORDER BY `addGrTime` DESC
        ");
        $result->bindParam(':numb', $numb, PDO::PARAM_INT);
        $result->execute();
        $members_in_group = $result->fetchAll();

        return $members_in_group;
    }

    public static function countMembersInGroup($numb)
    {
        $amount = count(self::getMembersInGroup($numb));

        return $amount;
    }

    public static function addMembersToGroupAjax($groupNumb, $members)
    {
        $db = Db::getConnection();

        foreach ($members as $memberId) {
            $result = $db->prepare('
                UPDATE `members` 
                SET `inGroup` = :groupNumb, 
                    `addGrTime` = :addDate 
                WHERE members.id = :id
            ');
            $addDate = date("Y-m-d H:i:s");
            $result->bindParam(':groupNumb', $groupNumb, PDO::PARAM_STR);
            $result->bindParam(':id', $memberId, PDO::PARAM_STR);
            $result->bindParam(':addDate', $addDate, PDO::PARAM_STR);
            $result->execute();
        }

        return true; 
    }

    public static function changeMemberAjax($id, $params)
    {
        $db = Db::getConnection();

        $name    = $params['name'];
        $surname = $params['surname'];
        $email   = $params['email'];
        $comment = $params['comment'];
        $program = $params['program'];
        $group   = $params['group'];

        foreach ($params as $key => $value) {
            $_SESSION['members'][$key] = $value;
        }
        
        $result = $db->query("
            SELECT `id` 
            FROM `programs` 
            WHERE `title` = '" . $program . "'
        ");
        $progID = $result->fetchAll(
            );
        $program = $progID['0']['id'];
        // print_r($program);
        // foreach ($_SESSION['programs'] as $value) {
        //     if (!$value) {
        //         print('Ошибка: должны быть заполнены все поля!');
        //         return;
        //     }
        // }

        // $uniqueTitle = self::getProgramByTitle($title);
        // // $errMsg()
        // if ($uniqueTitle) {
        //     print('Ошибка: такое название программы уже есть!');
        //     return;
        // }
        // print('Ошибки нет');

        $result = $db->prepare("
            UPDATE `members` 
            SET `name`           = :name, 
                `surname`        = :surname, 
                `email`          = :email, 
                `coachComment`   = :comment, 
                `program`        = :program,
                `inGroup`        = :group
            WHERE `id` = :id
        ");

        $result->bindParam(':id',      $id,      PDO::PARAM_INT);
        $result->bindParam(':name',    $name,    PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':email',   $email,   PDO::PARAM_STR);
        $result->bindParam(':comment', $comment, PDO::PARAM_STR);
        $result->bindParam(':program', $program, PDO::PARAM_INT);
        $result->bindParam(':group',   $group,   PDO::PARAM_INT);
        $result->execute();

        unset($_SESSION['members']);

        return true;
    }

    public static function memberGroupOut($id)
    {
        $db = Db::getConnection();
        $result = $db->prepare("
            UPDATE `members` 
            SET `inGroup` = 0
            WHERE `id` = :id
        ");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();

        $result = $db->prepare("
            SELECT `inGroup` 
            FROM `members` 
            WHERE `id` = :id
        ");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $group = $result->fetchAll();

        return $group['0']['inGroup'];
    }

    public static function createMember($params)
    {
        // $params = Common::cleanArr($params);

        $appeal  = trim($params['name']);
        $appeal  = explode(' ', $appeal, 2);
        $name    = array_shift($appeal);
        $surname = implode($appeal);
        $email   = $params['email']; 
        $comment = $params['comment']; 
        $program = $params['program'];
        
        $db = Db::getConnection();

        $result = $db->prepare("
            SELECT `id` 
            FROM `members` 
            WHERE `email` = :email
        ");
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $isMemb = $result->fetchAll();
        //$isMemb = $isMemb['0']['id'];
    // print_r($isMemb);
        if ($isMemb) return 110;

        // Get program-ID by title
        $result = $db->prepare("
            SELECT `id` 
            FROM `programs` 
            WHERE `title` = :title
        ");
        $result->bindParam(':title', $program, PDO::PARAM_STR);
        $result->execute();
        $progID = $result->fetchAll();
        $programID = $progID['0']['id'];

        // Create member
        $result = $db->prepare("
            INSERT INTO `members` (`id`, `name`, `surname`, `age`, `city`, `email`, `avatar`, `coachComment`, `program`, `status`, `profile`, `activationDate`, `inGroup`, `addGrTime`)
            VALUES (
                NULL, 
                :name, 
                :surname, 
                '', 
                '', 
                :email, 
                '',
                :coachComent,
                :program, 
                0,
                0, 
                CURRENT_TIMESTAMP, 
                '', 
                '')
        ");
        $result->bindParam(':name',        $name,      PDO::PARAM_STR);
        $result->bindParam(':surname',     $surname,   PDO::PARAM_STR);
        $result->bindParam(':email',       $email,     PDO::PARAM_STR);
        $result->bindParam(':coachComent', $comment,   PDO::PARAM_STR);
        $result->bindParam(':program',     $programID, PDO::PARAM_INT);
        $result->execute();

        $id = $db->lastInsertId();

        // Create personCard
        $personCard = self::createNewPersonCard($db, $id);
        // Create questionnare
        self::createNewQuestionnare($db, $id);
        // Create login & pass
    //echo "\r\nbegin\r\n";
        self::createLoginData($db, $id, $email, $name, $surname);

        // unset($_SESSION['members']);

        return true;
    }

    public static function delMemberAjax($id)
    {
        $db = Db::getConnection();

        $result = $db->prepare('
            DELETE FROM `members` WHERE `members`.`id` = :membID
        ');
        $result->bindParam(':membID', $id, PDO::PARAM_INT);
        $result->execute();

        return true;
    }

    public static function createNewQuestionnare($db, $id)
    {
        $result = $db->prepare("
            INSERT INTO `questions` (`id`, `memberID`, `smoke`, `alcohol`, `children`, `T1`, `H1`, `H2`, `H3`, `H4`, `H5`, `H6`, `H7`, `H8`, `H9`, `H10`, `H11`, `H12`, `H13`, `H14`, `H15`, `H16`, `H17`, `H18`, `L1`, `L2`, `L3`, `L4`, `L5`, `L6`, `L7`, `L8`, `L9`, `L10`, `L11`, `S1`, `S2`, `S3`, `A1`, `G1`, `G2`, `G3`, `F1`, `F2`, `W1`, `W2`, `W3`, `P1`, `P2`, `P3`, `P4`, `P5`) 
            VALUES (NULL, :membID, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')
            ");
        $result->bindParam(':membID', $id, PDO::PARAM_INT);
        $result->execute();

        return true;
    }

    public static function createNewPersonCard($db, $id)
    {
        $result = $db->prepare("
            INSERT INTO `personCard` (`id`, `memberID`, `trainMode`, `perWeek`, `measure`, `weight`, `height`, `chest`, `waist`, `hip`) VALUES (NULL, :membID, '', '', '', '', '', '', '', '')
            ");
        $result->bindParam(':membID', $id, PDO::PARAM_INT);
        $result->execute();

        return true;
    }

    public static function createLoginData($db, $id, $email, $name, $surname)
    {
        $pass = Common::generatePass(8);
    //echo $pass;
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        
        $result = $db->prepare("
            INSERT INTO `user_tab` (`id`, `user_id`, `log_id`, `name`, `surname`, `email`, `hash`, `ip`, `edit_time`, `attempts`, `allowed_time`, `exp`) 
            VALUES (NULL, :userID, '', :name, :surname, :email, :hash, '', '', '', '', :exp);
            ");
        $result->bindParam(':userID', $id, PDO::PARAM_INT);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':hash', $hash, PDO::PARAM_STR);
        $result->bindParam(':exp', $pass, PDO::PARAM_STR);
        $result->execute();

        return true;
    }

    public static function getProfileById($id)
    {
        $db = Db::getConnection();

        $result = $db->query("
            SELECT * FROM `members` AS m
            LEFT JOIN  `personCard` AS p
            ON m.id = p.memberID
            LEFT JOIN  `questions` AS q
            ON m.id = q.memberID
            LEFT JOIN  `programs` AS pr
            ON m.program = pr.id
            LEFT JOIN  `groups` AS gr
            ON m.inGroup = gr.numb
            WHERE m.`id` = " . $id . "
            ");
        $member = $result->fetchAll();
        if (!$member) {
            return false;
        }
        
        $member = Common::cleanArr2x($member); // trim + htmlentities;

        return $getMember = $member['0'];
    }

    // public static function getProfileById($id)
    // {
    //     $db = Db::getConnection();

    //     $result = $db->query("
    //         SELECT * FROM `members` AS m
    //         LEFT JOIN  `personCard` AS p
    //         ON m.id = p.memberID
    //         LEFT JOIN  `questions` AS q
    //         ON m.id = q.memberID
    //         LEFT JOIN  `programs` AS pr
    //         ON m.program = pr.id
    //         LEFT JOIN  `groups` AS gr
    //         ON m.inGroup = gr.numb
    //         WHERE m.`id` = " . $id . "
    //         ");
    //     $member = $result->fetchAll();
    //     if (!$member) {
    //         return false;
    //     }
        
    //     $member = Common::cleanArr2x($member); // trim + htmlentities;

    //     return $getMember = $member['0'];
    // }

    public static function addImg($id, $params)
    {
        $uploaddir = BASE_DOMAIN . '/template/img/members/' .$id.'/';
        if (!is_dir($uploaddir)) mkdir($uploaddir);

        $handle = opendir($uploaddir);

        foreach ($_FILES as $key => $value) {
            $filename = $_FILES[$key]['name'];
            
            if ($filename) {
                $extension = pathinfo($filename)['extension'];
                $file = $uploaddir . $key . '-' . $id . '.' . $extension;

                array_map("unlink", glob($uploaddir . $key . '*'));

                move_uploaded_file($_FILES[$key]['tmp_name'], $file);

                if ($key == 'avatar') {
                    $avatar = $key . '-' . $id . '.' . $extension;
                }
            }
        }

        closedir($handle);

        if (isset($avatar)) {
            return $avatar;
        } else {
            return false;
        }
    }

    public static function addProfile($id, $params)
    {
        $db = Db::getConnection();
        $result = $db->prepare("
            UPDATE `questions` AS q
            LEFT JOIN  `personCard` AS p
            ON q.memberID = p.memberID
            LEFT JOIN  `members` AS m
            ON q.memberID = m.id
            SET `smoke` = :smoke, 
                `alcohol` = :alcohol, 
                `children` = :children, 
                `T1` = :T1, 
                `H1` = :H1, 
                `H2` = :H2, 
                `H3` = :H3, 
                `H4` = :H4, 
                `H5` = :H5, 
                `H6` = :H6, 
                `H7` = :H7, 
                `H8` = :H8, 
                `H9` = :H9, 
                `H10` = :H10, 
                `H11` = :H11, 
                `H12` = :H12, 
                `H13` = :H13, 
                `H14` = :H14, 
                `H15` = :H15, 
                `H16` = :H16, 
                `H17` = :H17, 
                `H18` = :H18, 
                `L1` = :L1, 
                `L2` = :L2, 
                `L3` = :L3, 
                `L4` = :L4, 
                `L5` = :L5, 
                `L6` = :L6, 
                `L7` = :L7, 
                `L8` = :L8, 
                `L9` = :L9, 
                `L10` = :L10, 
                `L11` = :L11, 
                `S1` = :S1, 
                `S2` = :S2, 
                `S3` = :S3, 
                `A1` = :A1, 
                `G1` = :G1, 
                `G2` = :G2, 
                `G3` = :G3, 
                `F1` = :F1, 
                `F2` = :F2, 
                `W1` = :W1, 
                `W2` = :W2, 
                `W3` = :W3, 
                `P1` = :P1, 
                `P2` = :P2, 
                `P3` = :P3, 
                `P4` = :P4, 
                `P5` = :P5,
                
                `age` = :age,
                `city` = :city,
                `profile` = 1,
                
                `trainMode` = :trainMode,
                `perWeek` = :perWeek,
                `measure` = :measure,
                `weight` = :weight,
                `height` = :height,
                `chest` = :chest,
                `waist` = :waist,
                `hip` = :hip
            WHERE q.`memberID` = :membID
        ");

        $result->bindParam(':membID', $id, PDO::PARAM_INT);
        $result->bindParam(':smoke', $params['smoke'], PDO::PARAM_STR);
        $result->bindParam(':alcohol', $params['alcohol'], PDO::PARAM_STR);
        $result->bindParam(':children', $params['children'], PDO::PARAM_STR);
        $result->bindParam(':T1', $params['T1'], PDO::PARAM_STR);
        $result->bindParam(':H1', $params['H1'], PDO::PARAM_STR);
        $result->bindParam(':H2', $params['H2'], PDO::PARAM_STR);
        $result->bindParam(':H3', $params['H3'], PDO::PARAM_STR);
        $result->bindParam(':H4', $params['H4'], PDO::PARAM_STR);
        $result->bindParam(':H5', $params['H5'], PDO::PARAM_STR);
        $result->bindParam(':H6', $params['H6'], PDO::PARAM_STR);
        $result->bindParam(':H7', $params['H7'], PDO::PARAM_STR);
        $result->bindParam(':H8', $params['H8'], PDO::PARAM_STR);
        $result->bindParam(':H9', $params['H9'], PDO::PARAM_STR);
        $result->bindParam(':H10', $params['H10'], PDO::PARAM_STR);
        $result->bindParam(':H11', $params['H11'], PDO::PARAM_STR);
        $result->bindParam(':H12', $params['H12'], PDO::PARAM_STR);
        $result->bindParam(':H13', $params['H13'], PDO::PARAM_STR);
        $result->bindParam(':H14', $params['H14'], PDO::PARAM_STR);
        $result->bindParam(':H15', $params['H15'], PDO::PARAM_STR);
        $result->bindParam(':H16', $params['H16'], PDO::PARAM_STR);
        $result->bindParam(':H17', $params['H17'], PDO::PARAM_STR);
        $result->bindParam(':H18', $params['H18'], PDO::PARAM_STR);
        $result->bindParam(':L1', $params['L1'], PDO::PARAM_STR);
        $result->bindParam(':L2', $params['L2'], PDO::PARAM_STR);
        $result->bindParam(':L3', $params['L3'], PDO::PARAM_STR);
        $result->bindParam(':L4', $params['L4'], PDO::PARAM_STR);
        $result->bindParam(':L5', $params['L5'], PDO::PARAM_STR);
        $result->bindParam(':L6', $params['L6'], PDO::PARAM_STR);
        $result->bindParam(':L7', $params['L7'], PDO::PARAM_STR);
        $result->bindParam(':L8', $params['L8'], PDO::PARAM_STR);
        $result->bindParam(':L9', $params['L9'], PDO::PARAM_STR);
        $result->bindParam(':L10', $params['L10'], PDO::PARAM_STR);
        $result->bindParam(':L11', $params['L11'], PDO::PARAM_STR);
        $result->bindParam(':S1', $params['S1'], PDO::PARAM_STR);
        $result->bindParam(':S2', $params['S2'], PDO::PARAM_STR);
        $result->bindParam(':S3', $params['S3'], PDO::PARAM_STR);
        $result->bindParam(':A1', $params['radio-activity'], PDO::PARAM_STR);
        $result->bindParam(':G1', $params['G1'], PDO::PARAM_STR);
        $result->bindParam(':G2', $params['G2'], PDO::PARAM_STR);
        $result->bindParam(':G3', $params['G3'], PDO::PARAM_STR);
        $result->bindParam(':F1', $params['radio-nutrition'], PDO::PARAM_STR);
        $result->bindParam(':F2', $params['radio-nutrition-type'], PDO::PARAM_STR);
        $result->bindParam(':W1', $params['radio-time'], PDO::PARAM_STR);
        $result->bindParam(':W2', $params['W2'], PDO::PARAM_STR);
        $result->bindParam(':W3', $params['W3'], PDO::PARAM_STR);
        $result->bindParam(':P1', $params['P1'], PDO::PARAM_STR);
        $result->bindParam(':P2', $params['P2'], PDO::PARAM_STR);
        $result->bindParam(':P3', $params['P3'], PDO::PARAM_STR);
        $result->bindParam(':P4', $params['P4'], PDO::PARAM_STR);
        $result->bindParam(':P5', $params['P5'], PDO::PARAM_STR);

        $result->bindParam(':age', $params['age'], PDO::PARAM_STR);
        $result->bindParam(':city', $params['city'], PDO::PARAM_STR);

        $result->bindParam(':trainMode', $params['radio-general'], PDO::PARAM_STR);
        $result->bindParam(':perWeek', $params['perweek'], PDO::PARAM_STR);
        $result->bindParam(':measure', $params['radio-measure'], PDO::PARAM_STR);
        $result->bindParam(':weight', $params['weight'], PDO::PARAM_STR);
        $result->bindParam(':height', $params['height'], PDO::PARAM_STR);
        $result->bindParam(':chest', $params['chest'], PDO::PARAM_STR);
        $result->bindParam(':waist', $params['waist'], PDO::PARAM_STR);
        $result->bindParam(':hip', $params['hip'], PDO::PARAM_STR);
        
        $result->execute();

        return true;
    }

    public static function changeAvatar($id, $avatar)
    {
        if ($avatar) {
            $db = Db::getConnection();
            $result = $db->prepare("
                UPDATE `members`
                SET `avatar` = :avatar
                WHERE `id` = :id
            ");
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->bindParam(':avatar', $avatar, PDO::PARAM_STR);
            $result->execute();
        }

        return true;
    }
}