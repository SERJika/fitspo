<?php


/**
* 
*/
class ProgramsController
{
	
    public function actionIndex()
	{
		$programs = Programs::getProgramsList();

		require_once(BASE_DOMAIN . '/views/programs.php');
		
		return true;
	}

	public function actionDelProgramAjax($id)
	{
		
		Programs::delProgramById($id);

		return true;
	}

	public function actionAddProgramAjax()
	{
		$params = $_POST;
		Programs::addNewProgram($params);

		return true;
	}
}