<?php

class Admin
{
	public function actionLogin()
	{
		$email = '';
		$password = '';
	}

	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$errors = false;

		// Валидация полей
		if (!User::checkEmail($email)) {
			$errors[] = 'Неправильный email';
		}
		if (!User::checkPassword($password)) {
			$errors[] = 'Пароль не должен быть короче 6-ти символов';
		}

		// Проверяем существует ли пользователь
		$userId = User::checkUserData($email, $password);

		if ($userId == false) {
			// Если данные неправильные - показываем ошибку
			$errors[] = 'Неправильные данные для входа на сайт';
		} else {
			// Если данные правильные, запоминаем пользователя (сессия)
			User::auth($userId);

			// Перенаправляем пользователяв закрытую часть сайта (кабинет)
		}
	}

	require_once(BASE_DOMAIN . 'views/user/login.php');

	return true;
}