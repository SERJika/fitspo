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

	public function actionGetPDF($id)
	{
		// print_r($_POST);
		//$text = $_POST['text'];
		$pdf = Common::getPDF($id);

		//echo "<script>window.open('/', '_blanck');</script>";
	    return $pdf;
	}

	public function actionImages($id)
	{
		//$files = $_FILES;
		$files = Images::uploadArrayNormalize();
		print_r($files);
		print_r($_POST);

		//echo "<script>window.open('/', '_blanck');</script>";
		//
		$member = Members::getProfileById($id);

        $page = 'profileCard';
        require_once(BASE_DOMAIN . '/views/test.php');

	    return true;
	}

    // public function actionUpdateProfile($id)
    // {
    //     /**
    //      * Get member's profile
    //      **/
    //     //$member = Members::updateProfileById($id);
    //     $member = Members::getProfileById($id);

    //     $page = 'profileCard';
    //     require_once(BASE_DOMAIN . '/views/profile-active.php');

    //     return true;
    // }
	// public function actionGetPDFtext()
	// {
 //        require('/vendor/setasign/fpdf/makefont/makefont.php');
 //        MakeFont('/template/fonts/pdf_fonts/PT_Sans-Web-Regular.ttf','/template/fonts/pdf_fonts/PT_Sans-Web-Regular.afm','ISO-8859-4');
	// }
}