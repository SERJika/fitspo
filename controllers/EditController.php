<?php

/**
*   
*/
class EditController
{
	public function actionIndex()
	{
		require_once(BASE_DOMAIN . '/views/edit.php');
		
		return true;
	}


	public function actionQuite()
	{
		unset($_SESSION['user']);
		header('Location: /');
		
		return true;
	}
    

	public function actionLogin()
	{
		$param = $_POST;

		$msg = Edit::checkEdit($param);

        echo $msg; // выводит сообщение об ошибке

		return $msg;
	}

	public function actionRegist()
	{
		$msg = Edit::createAccAjax();

		return $msg;
	}
    
	// public function actionGetaccount()
	// {
	// 	$isNoAccount = true;
	// 	//require_once(BASE_DOMAIN . '/views/edit.php');
	// 	// header('Location: ' . THE_DOMAIN . 'entrance');
	// 	//header('Location: /');
	// 	require_once(BASE_DOMAIN . '/views/edit.php');
		
	// 	return true;
	// }
}