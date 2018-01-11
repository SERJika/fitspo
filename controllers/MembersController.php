<?php

#include_once (BASE_DOMAIN . '/models/News.php');

/**
* 
*/
class MembersController
{
    public function actionIndex()
    {
        /**
         * Get members list
         */
        $members = Members::getMembersList();
        $page = "membersList";

        require_once(BASE_DOMAIN . '/views/members.php');
        
        return true;
    }

    public function actionView($id)
    {
        /**
         * Get member's card
         **/
        $member = Members::getMemberById($id);
        $nameStr = $member['name'] . ' ' . $member['surname'];
        $page = "memberCard";
        require_once(BASE_DOMAIN . '/views/single-member.php');

        return true;
    }

    public function actionAddToGroupAjax($groupNumb)
    {
        /**
         * Add members to the group
         **/
        $members = $_POST;
        
        Members::addMembersToGroupAjax($groupNumb, $members);        

        return true; 
    }

    public function actionChangeMemberAjax($id)
    {
        /**
         * Change (Update) member's card
         **/
        $params = $_POST;
        
        Members::changeMemberAjax($id, $params);    

        return true; 
    }

    public function actionDelMemberAjax($id)
    {
        /**
         * Del member's card
         **/
        Members::delMemberAjax($id);    

        return true; 
    }

    public function actionCreateMember()
    {
        /**
         * Create member
         **/
        $addMember = $_POST;
// echo "MembContr start \r\n";
//print_r($_POST);        
//echo "first \r\n";
        $res = Members::createMember($addMember);   
// echo "MembContr stop \r\n";
echo $res;
        return $res; 
    }


    // public function actionGetProfile($id)
    // {
    //     /**
    //      * Get and update member's profile
    //      **/
    //     $member = Members::getProfileById($id);

    //     if ($member['profile']) {
    //         $page = 'profileList';
    //         // print_r($member);
    //         require_once(BASE_DOMAIN . '/views/profile-static.php');
    //     } else {
    //         $page = 'profileCard';
    //         require_once(BASE_DOMAIN . '/views/profile-active.php');
    //     }
    //     return true;
    // }

    public function actionGetProfile($id)
    {
        /**
         * Get member's profile
         **/
        $member = Members::getProfileById($id);

        //if ($member['profile']) { // два значения 0 (анкеты не заполнена) и 1 (анкета заполнена))
            $page = 'profileList';
            require_once(BASE_DOMAIN . '/views/profile-static.php');
        
        return true;
    }
    
    public function actionUpdateProfile($id)
    {
        /**
         * Get member's profile
         **/
        //$member = Members::updateProfileById($id);
        $member = Members::getProfileById($id);

        $page = 'profileCard';
        require_once(BASE_DOMAIN . '/views/profile-active.php');

        return true;
    }
    
    public function actionQuestionnaire($id)
    {
        /**
         * Get member's profile
         **/
        //$member = Members::updateProfileById($id);
        $member = Members::getProfileById($id);

        $page = 'profileCard';
        $membID = $id;

        require_once(BASE_DOMAIN . '/views/questionnaire.php');

        return true;
    }

    public function actionAddProfile($id)
    {
        /**
         * Create member's profile
         **/
        $avatar = Members::addImg($id, $_POST); 
        Members::changeAvatar($id, $avatar);
        // require_once(BASE_DOMAIN . "/handlers/endpoint.php");
        Members::addProfile($id, $_POST);
        
        header('Location: ' . THE_DOMAIN . '/');

        return true; 
    }
}