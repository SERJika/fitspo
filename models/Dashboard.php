<?php
/**
 * 
 */
class Dashboard
{

	public static function getDashboard()
	{
		$dashboard = [
		'adminName' 		=> Admin::getAdmin(),
		'groups' 			=> Groups::getGroupsList(),
		'members'			=> Members::getMembersList(),
		'reportsNew' 		=> Reports::getNewReports(),
		'reportsLost' 		=> Reports::getLostReports(),
		'questionnariesNew' => Questionnaries::getNewQuestionnaries(),
		];

		return $dashboard;
	}
}