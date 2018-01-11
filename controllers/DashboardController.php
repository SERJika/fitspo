<?php

/**
*
*/
class DashboardController
{
	public function actionIndex()
	{
		$dashboard = Dashboard::getDashboard();

		$adminName = $dashboard['adminName'];
		$groups = count($dashboard['groups']);
		$members = count($dashboard['members']);
		$newReports = count($dashboard['reportsNew']);
		$noReports = count($dashboard['reportsLost']);
		$newQuestionnaries = count($dashboard['questionnariesNew']);
		$page = 'dashboard';

		require_once(BASE_DOMAIN . '/views/dashboard-admin.php');

		return true;
	}
}