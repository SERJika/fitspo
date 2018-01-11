<?php
return array(
    'groups/updateGroup/([0-9]+)'      => 'groups/updateGroupAjax/$1',
    'groups/group-new'                 => 'groups/new',
    'groups/group-([0-9]+)'            => 'groups/view/$1',
    'groups/delGroup-([0-9]+)'         => 'groups/delGroup/$1',
    // 'groups/getFinish/([A-Za-zА-Яа-яЁё0-9]+)'
    //                                    => 'groups/getFinish/$1',
    'groups'                           => 'groups/index',

    'programs/addProgram'              => 'programs/addProgramAjax',
    'programs/delProgram/([0-9]+)'     => 'programs/delProgramAjax/$1',
    'programs([a-zA-Z0-9=?])+'         => 'programs/index',
    'programs'                         => 'programs/index',

    'questionnaire/profile-([0-9]+)'   => 'members/questionnaire/$1',

    'members/addToGroup/([0-9]+)'      => 'members/addToGroupAjax/$1',
    'members/changeMember/([0-9]+)'    => 'members/changeMemberAjax/$1',
    'members/delMember/([0-9]+)'       => 'members/delMemberAjax/$1',
    'members/member-([0-9]+)'          => 'members/view/$1',
    'members/get_profile-([0-9]+)'     => 'members/getProfile/$1',
    'members/update_profile-([0-9]+)'  => 'members/updateProfile/$1',
    'members/addProfile/([0-9]+)'      => 'members/addProfile/$1',
    'members/createMember'             => 'members/createMember',
    'members/reports/([0-9]+)'         => 'members/viewReport/$1',
    'members'                          => 'members/index',

    'sendQuestionnaire/([0-9]+)'       => 'mail/sendQuestionnaire/$1',

    'rules'                            => 'rules/rules',
    'how-to-eat/([0-9]+)'              => 'rules/recomNutrilon/$1',
    'how-to-eat-changes'               => 'rules/recomNutrilonChange',
    'how-to-eat'                       => 'rules/recomNutrilon',
    'sport-food/([0-9]+)'              => 'rules/recomNutrilonSport/$1',
    'sport-food-changes'               => 'rules/recomNutrilonSportChange',
    'sport-food'                       => 'rules/recomNutrilonSport',
    'how-to-train'                     => 'rules/recomTrainings',
    'faq'                              => 'rules/recomFAQ',

    'meal-plan'                        => 'settings/food',
    'training-plan'                    => 'settings/trainings',
    'exercise'                         => 'settings/exercises',

    'temp'                             => 'settings/temp',

    'regist'                           => 'edit/regist',
    'login'                            => 'edit/login',
    'entrance'                         => 'edit/index',
    'quite'                            => 'edit/quite',
    // 'getaccount'                       => 'edit/getaccount',
    // 'dashboard'                        => 'dashboard/index',
    '([0-9a-zA-Z]+)'                   => 'dashboard/index',
    ''                                 => 'dashboard/index',
);