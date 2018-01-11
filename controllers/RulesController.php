<?php


/**
*
*/
class RulesController
{

    public function actionRules()
	{
		$rules = Rules::getRulesList();

		require_once(BASE_DOMAIN . '/views/rules-list.php');

		return true;
	}

	public function actionFAQ()
	{
		$rules = Rules::getFAQ();

		require_once(BASE_DOMAIN . '/views/recom-faq.php');

		return true;
	}

	public function actionRecomTrainings()
	{
		$rules = Rules::getTrainingRecomendations();

		require_once(BASE_DOMAIN . '/views/recom-trainings.php');

		return true;
	}

	public function actionRecomNutrilonSport($key = '')
	{
		$nutrilonSport = Rules::getNutrilonSportRecomendations();

		if ($key === '') {
		    require_once(BASE_DOMAIN . '/views/recom-nutrilon-sport-static.php');
        } else {
		    require_once(BASE_DOMAIN . '/views/recom-nutrilon-sport-active.php');
        }

		return true;
	}

	public function actionRecomNutrilonSportChange()
	{
		$changes = $_POST['tinymce_1'];

		$key = Rules::setNutrilonSportRecomendations($changes);

		self::actionRecomNutrilonSport($key);

		return true;
	}

    public function actionRecomNutrilon($key = '')
	{
		$nutrilon = Rules::getNutrilonRecomendations();

		if ($key === '') {
			require_once(BASE_DOMAIN . '/views/recom-nutrilon-static.php');
		} else {
			require_once(BASE_DOMAIN . '/views/recom-nutrilon-active.php');
		}

		return true;
	}

	public function actionRecomNutrilonChange()
	{
		$changes = $_POST['tinymce_1'];

		$key = Rules::setNutrilonRecomendations($changes);

		self::actionRecomNutrilon($key);

		return true;
	}

	public function actionGetText($type)
	{
		$rules = Rules::getText($type);

		require_once(BASE_DOMAIN . '/views/food-list.php');

		return true;
	}

    public function actionShowText($type)
	{
		$rules = Rules::theText($type);

		require_once(BASE_DOMAIN . '/views/food-list.php');

		return true;
	}
	// public function actionDelProgramAjax($id)
	// {

	// 	Programs::delProgramById($id);

	// 	return true;
	// }

	// public function actionAddProgramAjax()
	// {
	// 	$params = $_POST;
	// 	Programs::addNewProgram($params);

	// 	return true;
	// }
}