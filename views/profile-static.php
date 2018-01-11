<!-- <?php //include(BASE_DOMAIN . '/views/header-profile.php');?> -->
<?php include(BASE_DOMAIN . '/views/header.php');?>

<!-- Основной контент странички -->
  <div class="page single-page-user-setting">
    <div class="container-fluid">
      <div class="row page-info-user">

        <div class="col-xs-13 col-sm-6">
          <ul class="breadcrumbs">
            <li><a href="/members">Участники</a></li>
            <li><a href="/members/member-<?php echo $id ?>">Участник-<?php echo $id ?></a></li>
            <li class="active">Анкета-<?php echo $id ?></li>
          </ul>

          <h1 class="page-title">Анкета-<?php echo $id ?></h1>
        </div>
      </div>

      <section class="row page-content page-content-anketa">
            <!-- <p>Информация, внесенная тобой, до окончательной отправки анкеты сохраняется автоматически и ты всегда сможешь вернуться к заполнению с того момента, где ты остановилась.</p> -->

<?php
$thedir = BASE_DOMAIN . '/template/img/members/' . $id . '/';
$src = THE_DOMAIN . '/template/img/members/' . $id . '/';
if ( is_dir( $thedir ) && $handle = opendir( $thedir ) ) {
    while (false !== ($entry = readdir($handle))) {
      // print_r($entry);
      if (fnmatch("avatar-*", $entry )) {
        $imgAvatar = $src . $entry;
      }
      if (fnmatch("front-*", $entry )) {
        $imgFront = $src . $entry;
      }
      if (fnmatch("back-*", $entry )) {
        $imgBack = $src . $entry;
      }
      if (fnmatch("side-*", $entry )) {
        $imgSide = $src . $entry;
      }
    }
    $entry = '';
    $thedir = '';
    closedir($handle);
}
    if ( !isset( $imgAvatar ) ) {
      $avatar = '<i class="material-icons user-icon">face</i>';
    } else {
      $avatar = '<img src="' . $imgAvatar . '" style="width: 100px;" alt="Аватарка-' . $id . '" />';
    }
?>
        <section class="general clearfix" style="padding-bottom: 0;">
          <h3>Данные об участнице программы</h3>
          <div style="width: 20%; float: left;">
            <div class="meta-user-media">
              <div class="photo">
                <?php echo $avatar; ?>
              </div>
            </div>
          </div>
          <div style="width: 40%; float: left;">
            <p class="" style="margin: 0 0 10px; padding: 0;">
              <span style="display: inline-block; width: 28%; font-weight: bold;">Имя</span>
              <span style="display: inline-block; width: 70%;"><?php echo $member['name'] ?></span>
            </p>
            <p class="" style="margin: 0 0 10px; padding: 0;">
              <span style="display: inline-block; width: 28%; font-weight: bold;">Фамилия</span>
              <span style="display: inline-block; width: 70%;"><?php echo $member['surname'] ?></span>
            </p>
            <p class="" style="margin: 0 0 10px; padding: 0;">
              <span style="display: inline-block; width: 28%; font-weight: bold;">Возраст</span>
              <span style="display: inline-block; width: 70%;"><?php echo Common::isGetVal($member['age']) ?></span>
            <p class="" style="margin: 0 0 10px; padding: 0;">
              <span style="display: inline-block; width: 28%; font-weight: bold;">Город</span>
              <span style="display: inline-block; width: 70%;"><?php echo $member['city'] ?></span>
            </p>
            <p class="" style="margin: 0 0 10px; padding: 0;">
              <span style="display: inline-block; width: 28%; font-weight: bold;">E-mail</span>
              <span style="display: inline-block; width: 70%;"><?php echo $member['email'] ?></span>
            </p>
          </div>
          <div style="width: 40%; float: left;">
            <p class="" style="margin: 0 0 10px; padding: 0;">
              <span style="display: inline-block; width: 28%; font-weight: bold;">Рост</span>
              <span style="display: inline-block; width: 70%;"><?php echo Common::isGetVal($member['height'], 'см'); ?></span>
            </p>
            <p class="" style="margin: 0 0 10px; padding: 0;">
              <span style="display: inline-block; width: 28%; font-weight: bold;">Вес</span>
              <span style="display: inline-block; width: 70%;"><?php echo Common::isGetVal($member['weight'], $member['measure']);  ?></span>
            </p>
            <p class="" style="margin: 0 0 10px; padding: 0;">
              <span style="display: inline-block; width: 28%; font-weight: bold;">Грудь</span>
              <span style="display: inline-block; width: 70%;"><?php echo Common::isGetVal($member['chest'], 'см'); ?></span>
            </p>
            <p class="" style="margin: 0 0 10px; padding: 0;">
              <span style="display: inline-block; width: 28%; font-weight: bold;">Талия</span>
              <span style="display: inline-block; width: 70%;"><?php echo Common::isGetVal($member['waist'], 'см'); ?></span>
            </p>
            <p class="" style="margin: 0 0 10px; padding: 0;">
              <span style="display: inline-block; width: 28%; font-weight: bold;">Бедра</span>
              <span style="display: inline-block; width: 70%;"><?php echo Common::isGetVal($member['hip'], 'см'); ?></span>
            </p>
          </div>
        </section>


        <section class="general clearfix" style="padding-bottom: 0;">
          <h3>Общие вопросы</h3>
          <div class="clearfix">
            <div style="width: 50%; float: left;">
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: inline-block; width: 35%; font-weight: bold;">Номер группы</span>
                <span style="display: inline-block; width: 64%;"><?php echo Common::isGetVal($member['inGroup']); ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: inline-block; width: 35%; font-weight: bold;">Программа тренировок</span>
                <span style="display: inline-block; width: 64%;"><?php echo $member['title'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: inline-block; width: 35%; font-weight: bold;">Дата регистрации</span>
                <span style="display: inline-block; width: 64%;"><?php echo $member['activationDate'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: inline-block; width: 35%; font-weight: bold;">Старт группы</span>
                <span style="display: inline-block; width: 64%;"><?php echo $member['start'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: inline-block; width: 35%; font-weight: bold;">Финиш группы</span>
                <span style="display: inline-block; width: 64%;"><?php echo $member['finish'] ?></span>
              </p>
            </div>
            <div style="width: 50%; float: left;">
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: inline-block; width: 35%; font-weight: bold;">Режим тренировок</span>
                <span style="display: inline-block; width: 64%;"><?php echo $member['trainMode'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: inline-block; width: 35%; font-weight: bold;">Кратность тренировок</span>
                <span style="display: inline-block; width: 64%;"><?php echo Common::isGetVal($member['perWeek'], 'в неделю'); ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: inline-block; width: 35%; font-weight: bold;">Какой спортинвентарь есть</span>
                <span style="display: inline-block; width: 64%;"><?php echo $member['T1'] ?></span>
              </p>
            </div>
          </div>
        </section>

        <section class="health clearfix" style="padding-bottom: 0;">
          <h3>Образ жизни и здоровье</h3>
          <div class="clearfix">
            <div style="width: 50%; float: left;">
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: inline-block; width: 35%; font-weight: bold;">Курение</span>
                <span style="display: inline-block; width: 64%;"><?php echo $member['smoke'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: inline-block; width: 35%; font-weight: bold;">Алкоголь</span>
                <span style="display: inline-block; width: 64%;"><?php echo $member['alcohol'] ?></span>
              </p>
            </div>
            <div style="width: 50%; float: left;">
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: inline-block; width: 35%; font-weight: bold;">Дети</span>
                <span style="display: inline-block; width: 64%;"><?php echo $member['children'] ?></span>
              </p>
            </div>
          </div>

          <div class="column">
            <div class="group">
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Теряла ли ты когда-нибудь сознание? Во время тренировок или по какой-то другой причине?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H1'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Давление обычно: нормальное, пониженное, повышенное?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H2'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Есть ли хронические заболевания? (Например, давление, диабет, рак, высокий холестерин)?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H3'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Принимаешь ли какие-либо лекарства? Какие?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H4'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Были ли операции? Когда и почему?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H5'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Нет ли противопоказаний для тренировок?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H6'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Постоянный ли цикл месячных?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H7'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Пропадали ли месячные после какого-то питания и нагрузок?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H8'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Понимашь ли ты, что цикл может запаздывать из-за кардинальной смены деятельности (с дивана в зал)?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H9'] ?></span>
              </p>
            </div>
          </div>

          <div class="column">
            <div class="group">
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Есть ли особые жалобы на суставы или кости, которые возникают именно при занятиях спортом?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H10'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Случалось ли испытывать боль в груди во время тренировок?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H11'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Возникает ли боль в груди при отсутствии тренировок? Возникает ли боль в груди по какой-то другой причине?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H12'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">В каких местах возникает боль при выполнении упражнений?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H13'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Какие это упражнения?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H14'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Есть ли сколиоз?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H15'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Были ли когда-то переломы, травмы? Какие и когда были?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H16'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Принимаешь ли ты витамины? Какие?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H17'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Когда ты последний раз посещала терапевта, сдавала кровь? (Если давно, то рекомендую сдать анализы и провериться)</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['H18'] ?></span>
              </p>
            </div>
          </div>
        </section>

        <section class="lifestyle clearfix" style="padding-bottom: 0;">
          <h3>Образ жизни</h3>
          <div class="column">
            <div class="group">
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Профессия? Образ жизни</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['L1'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Сколько часов в день ты сидишь?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['L2'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Какие у тебя хобби?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['L3'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Сколько воды выпиваешь за день, не считая кофе и чай?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['L4'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Занимаешься ли ты спортом (теннис, плаванье, футбол)</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['L5'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Какую обувь ты носишь на работу?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['L6'] ?></span>
              </p>
            </div>
          </div>
          <div class="column" style="margin-top: 0;">
            <div class="group">
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Возникают ли у тебя стрессы на работе или дома?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['L7'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Сколько часов ты спишь?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['L8'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Стаж тренировок в зале/дома (сроки). Сколько лет без перерывов?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['L9'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Есть ли командировки или частые дальние поездки?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['L10'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Ты домохозяйка?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['L11'] ?></span>
              </p>
            </div>
          </div>
        </section>

        <section class="about clearfix" style="padding-bottom: 0;">
          <h3>Рассказ о себе</h3>
          <div class="column" style="margin-top: 0;">
            <div class="group">
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Характер, привычки, режим, стиль жизни, убеждения</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['S1'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Рацион в течение дня</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['S2'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Любимые продукты, от которых "срывает" голову</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['S3'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Самооценка активности и питания</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['A1'] ?></span>
              </p>
            </div>
          </div>
        </section>

        <section class="target clearfix" style="padding-bottom: 0;">
          <h3>Цели</h3>
          <div class="column" style="margin-top: 0;">
            <div class="group">
                <p class="" style="margin: 0 0 10px; padding: 0;">
                  <span style="display: block; font-weight: bold;">Текущая ситуация</span>
                  <span style="display: block; padding-left: 40px;"><?php echo $member['G1'] ?></span>
                </p>
                <p class="" style="margin: 0 0 10px; padding: 0;">
                  <span style="display: block; font-weight: bold;">Краткосрочная цель</span>
                  <span style="display: block; padding-left: 40px;"><?php echo $member['G2'] ?></span>
                </p>
                <p class="" style="margin: 0 0 10px; padding: 0;">
                  <span style="display: block; font-weight: bold;">Долгосрочная цель</span>
                  <span style="display: block; padding-left: 40px;"><?php echo $member['G3'] ?></span>
                </p>
              </div>
            </div>
          </section>

        <section class="nutrition clearfix" style="padding-bottom: 0;">
          <h3>Пожелания к питанию</h3>
          <div class="column" style="margin-top: 0;">
            <div class="group">
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Допустимые ограничения в питании</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['F1'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Тип питания</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['F2'] ?></span>
              </p>
            </div>
          </div>
        </section>

        <section class="work clearfix" style="padding-bottom: 0;">
          <h3>Пожелания к работе в целом</h3>
          <div class="column" style="margin-top: 0;">
            <div class="group">
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Когда планируешь тренироваться?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['W1'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Есть возможность на работе есть из лоточков или придется меню подстраивать под столовую?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['W2'] ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Нет никаких препятствий носить с собой еду, заготовленную с вечера 3 месяца?</span>
                <span style="display: block; padding-left: 40px;"><?php echo $member['W3'] ?></span>
              </p>
            </div>
          </div>
        </section>

        <section class="gallery" style="padding-bottom: 0;">
          <h3>Фотографии до начала тренировок</h3>
          <div style="display: inline-block;width: 32%; height: 640px; ">
            <p>Вид спереди</p>
            <p style="width: 100%; height: 100%;  overflow: hidden;">
              <img src="<?php echo $imgFront ?>" style="max-width: 100%; max-height: 100%;" alt="Вид спереди-<?php echo $id ?>" />
            </p>
          </div>
          <div style="display: inline-block;width: 30%; height: 640px; ">
            <p>Вид сзади</p>
            <p style="width: 100%; height: 100%; overflow: hidden;">
              <img src="<?php echo $imgBack?>" style="max-width: 100%; max-height: 100%;" alt="Вид сзади-<?php echo $id ?>" />
            </p>
          </div>
          <div style="display: inline-block;width: 30%; height: 640px; ">
            <p>Вид сбоку</p>
            <p style="width: 100%; height: 100%; overflow: hidden;">
              <img src="<?php echo $imgSide ?>" style="max-width: 100%; max-height: 100%;" alt="Вид сбоку-<?php echo $id ?>" />
            </p>
          </div>
        </section>

        <section class="agreement clearfix" style="padding-bottom: 0;">
          <h3>Согласие на работу со мной</h3>
          <div class="column" style="margin-top: 0;">
            <div class="group">
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Осознаешь ли ты, что при отсутствии живого тренера рядом вся техника безопасности ложится на твои плечи?</span>
                <span style="display: block; padding-left: 40px;"><?php echo Common::isGetAnsw($member['P1']); ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Обещаешь ли оповещать меня о головокружениях, аллергиях, обмороках, дискомфортах (запоры, поносы, и т.д), которые тебя беспокоят?</span>
                <span style="display: block; padding-left: 40px;"><?php echo Common::isGetAnsw($member['P2']); ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Обязуешься ли ты не публиковать эту программу и не передавать третим лицам?</span>
                <span style="display: block; padding-left: 40px;"><?php echo Common::isGetAnsw($member['P3']); ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Осознаешь ли ты, что в питании трудно изобрести велосипед, и построить тело можно только преверенными методами?</span>
                <span style="display: block; padding-left: 40px;"><?php echo Common::isGetAnsw($member['P4']); ?></span>
              </p>
              <p class="" style="margin: 0 0 10px; padding: 0;">
                <span style="display: block; font-weight: bold;">Понимаешь ли ты, что обращаешься за программой к тренеру, который полностью доверят представленной тобой информации?</span>
                <span style="display: block; padding-left: 40px;"><?php echo Common::isGetAnsw($member['P5']); ?></span>
              </p>
            </div>
          </div>
        </section>

      </section>
    </div>
  </div>
   <!-- End Основной контент странички -->

<?php include(BASE_DOMAIN . '/views/footer-profile.php');?>