<?php  if ( !isset($page) ) $page = ''; ?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ru" class="no-js css-menubar"> <!--<![endif]-->

<head>

  <meta charset="utf-8">

  <title>Админ</title>
  <meta name="description" content="">

  <link rel="shortcut icon" href="<?php echo THE_DOMAIN?>template/img/favicon/favicon.ico" type="image/x-icon">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo THE_DOMAIN?>template/libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo THE_DOMAIN?>template/libs/mmenu/dist/css/jquery-mmenu.min.css">
  <link rel="stylesheet" href="<?php echo THE_DOMAIN?>template/libs/animsition/animsition.min.css">
  <link rel="stylesheet" href="<?php echo THE_DOMAIN?>template/libs/asscrollable/asScrollable.min.css">
  <link rel="stylesheet" href="<?php echo THE_DOMAIN?>template/libs/Waves-0.7.5/dist/waves.min.css">
  <link rel="stylesheet" href="<?php echo THE_DOMAIN?>template/libs/scrollbar/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="<?php echo THE_DOMAIN?>template/libs/calendario/fullcalendar.css">

  <?php if ($page == 'profileCard'): ?>
  <!-- <link rel="stylesheet" href="<?php echo THE_DOMAIN?>template/libs/fine-uploader/fine-uploader-new.min.css"> -->
  <link rel="stylesheet" href="<?php echo THE_DOMAIN?>template/libs/fine-uploader/fine-uploader.css">
  <link rel="stylesheet" href="<?php echo THE_DOMAIN?>template/css/main-user.css">
<?php else: ?>
  <link rel="stylesheet" href="<?php echo THE_DOMAIN?>template/css/main.css">
<?php endif ?>

  <!-- <script type="text/javascript" src="http://gc.kis.v2.scr.kaspersky-labs.com/A2BC3B79-CC71-4F45-8BCC-397CDDC3BF80/main.js" charset="UTF-8"></script> -->
  <script src="<?php echo THE_DOMAIN?>template/libs/modernizr/modernizr.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/breakpoints/breakpoints.min.js"></script>
  <script>
    Breakpoints();
  </script>

<!--   <style type="text/css">
    iframe#tinymce_1_ifr {
      /*height: auto;*/
      max-height: 250px;
    }
  </style> -->

</head>

<body class="" style="margin: 0; padding: 0">
  <nav class="">
    <a href="http://newyorkfitspo.ru/" style="display: block; margin: 15px auto; padding-left: 40px;"><i class="icon md-home" aria-hidden="true"></i> Перейти на сайт</a>
  </nav>

  <!-- Боковое меню -->
<!--   <div class="site-menubar site-menubar-dark">
    <ul class="site-menu">
      <li class="site-menu-item active">
        <a class="animsition-link" href="/groups">
          <i class="site-menu-icon md-view-group" aria-hidden="true"></i>
          <span class="site-menu-title">Группы</span>
        </a>
      </li>

      <li class="site-menu-item">
        <a class="animsition-link" href="/members">
          <i class="site-menu-icon md-view-user" aria-hidden="true"></i>
          <span class="site-menu-title">Участники</span>
        </a>
      </li>

      <li class="site-menu-item has-sub">
        <a href="javascript:void(0)">
          <i class="site-menu-icon md-view-setting" aria-hidden="true"></i>
          <span class="site-menu-title">Настройка программ</span>
          <span class="site-menu-arrow"></span>
        </a>
        <ul class="site-menu-sub">
          <li class="site-menu-item">
            <a class="animsition-link" href="/programs">
              <span class="site-menu-title">Программы</span>
            </a>
          </li>

          <li class="site-menu-item">
            <a class="animsition-link" href="/rules">
              <span class="site-menu-title">Правила курса</span>
            </a>
          </li>

          <li class="site-menu-item has-sub">
            <a href="javascript:void(0)">
              <span class="site-menu-title">Рекомендации</span>
              <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item">
                <a class="animsition-link" href="/sport-food">
                  <span class="site-menu-title">Спортивное питание</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a class="animsition-link" href="/how-to-eat">
                  <span class="site-menu-title">Как питаться</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a class="animsition-link" href="/how-to-train">
                  <span class="site-menu-title">Как тренироваться</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a class="animsition-link" href="/faq">
                  <span class="site-menu-title">FAQ</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="site-menu-item">
            <a class="animsition-link" href="/exercise">
              <span class="site-menu-title">Упражнения</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a class="animsition-link" href="/training-plan">
              <span class="site-menu-title">План тренировок</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a class="animsition-link" href="/meal-plan">
              <span class="site-menu-title">Питание</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div> -->
  <!-- End Боковое меню -->