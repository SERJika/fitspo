<?php

/**
* 
*/
class GroupsController
{
    
    public function actionIndex()
    {
        $groupsList = array();
        $groupsList = Groups::getGroupsList();
        $page = 'groupsList';    
        require_once(BASE_DOMAIN . '/views/groups.php');
        
        return true;
    }

    public function actionView($numb)
    {
        if ($numb) {
            $group = Groups::getGroupByNumb($numb);
            $members_in_group = Members::getMembersInGroup($numb);
            $members_out_of_group = Members::getMembersOutOfGroup();
        }
        $page = 'groupCard';    
        require_once(BASE_DOMAIN . '/views/single-group.php');

        return true;
    }

    public function actionNew()
    {
        
        $group = Groups::getNewGroup();
        $members_in_group = [];
        $members_out_of_group = Members::getMembersOutOfGroup();
        $page = 'groupNew';
        $duration = Groups::getProgDuration();
        require_once(BASE_DOMAIN . '/views/single-group.php');

        return true;
    }

    public function actionUpdateGroupAjax($id)
    {
        
        $param = $_POST; 
        
        if ($id && $param) {
            $arrUpdateGroups = Groups::UpdateGroupAjax($id, $param);
        }

        // print_r(json_encode($arrUpdateGroups));
        return true; 
    }
    
    public function actionDelGroup($numb)
    {
        echo 'Удалить группу №'.$numb."\r\n";
        $result = Groups::delGroup($numb);
        // $groups = self::actionIndex();
        return true;
    }
}