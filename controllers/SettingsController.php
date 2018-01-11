<?php


/**
*
*/
class SettingsController
{
    public function actionFood()
	{
		$rules = Settings::getFoodList();

		require_once(BASE_DOMAIN . '/views/food-list.php');

		return true;
	}

	public function actionTrainings()
	{
		$rules = Settings::getTrainingsList();

		require_once(BASE_DOMAIN . '/views/trainings-list.php');

		return true;
	}

	public function actionExercises()
	{
		$rules = Settings::getExercisesList();

		require_once(BASE_DOMAIN . '/views/exercises-list.php');

		return true;
	}

    public function actionTemp()
	{
		//$rules = Settings::getExercisesList();

		require_once(BASE_DOMAIN . '/views/temp.php');

		return true;
	}
}