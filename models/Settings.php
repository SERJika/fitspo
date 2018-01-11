<?php

class Settings
{

    public static function getFoodList()
    {
        $db = Db::getConnection();

        $settings = '';

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

        return $settings;
    }

    public static function getTrainingsList()
    {
        $db = Db::getConnection();

        $settings = '';

        return $settings;
    }

    public static function getExercisesList()
    {
        $db = Db::getConnection();

        $settings = '';

        return $settings;
    }
}