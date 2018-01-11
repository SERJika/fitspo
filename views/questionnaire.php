<?php //include(BASE_DOMAIN . '/views/header-profile.php');

  //$_SESSION['membID'] = $membID;


        setcookie("user_id", $id, time()+3600); // 3600 = 1 hour
        $_SESSION["user_id"] = $id;
        

?>
<?php include(BASE_DOMAIN . '/views/header.php');?>

<?php //print_r($_COOKIE); ?>

<!-- Основной контент странички -->
  <div class="page single-page-user-setting">
    <div class="container-fluid">
      <div class="row page-info-user">

        <div class="col-xs-13 col-sm-6">
          <ul class="breadcrumbs">
            <li class="active">Анкета</li>
          </ul>

          <h1 class="page-title">Анкета</h1>
        </div>
      </div>

      <form class="row page-content page-content-anketa" enctype="multipart/form-data"  method="post" action="/members/addProfile/<?php echo $id ?>" id="questionnareForm">
      <!-- <form class="row page-content page-content-anketa" enctype="multipart/form-data"  method="post" action="/handlers/endpoint.php" id="questionnareForm"> -->
        <input type="hidden" name="profileID" value="<?php echo $membID ?>" />

        <section class="recomend clearfix">
          <div class="column">
            <h3>Рекомендации по заполнению</h3>
            <p>Для того, чтобы заполнить анкету тебе понадобится:</p>
            <ul>
              <li>Быть честной и открытой. Довериться мне, как специалисту, который может помочь в достижении твоих целей</li>
              <li>Немного свободного времени. В среднем заполнение анкеты занимает 20 минут</li>
              <li>Сделать несколько фотографий и загрузить их в специальный раздел анкеты (приготовь смартфон или фотоаппарат)</li>
              <li>Ответить на все вопросы в анкете</li>
            </ul>
            <!-- <p>Информация, внесенная тобой, до окончательной отправки анкеты сохраняется автоматически и ты всегда сможешь вернуться к заполнению с того момента, где ты остановилась.</p> -->
          </div>
        </section>
<script type="text/javascript"> </script>
        <section>
          <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
          <p style="font-size: 20px;"><span style="display: inline-block; width: 140px;">Аватарка:</span><input style="display: inline-block; margin-left: 20px; font-size: 16px;" type="file" name="avatar" /></p>
          <p>
            <span style="display: inline-block; width: 28%; font-size: 20px;">Имя:</span>
            <span style="display: inline-block; width: 70%;"><?php echo $member['name'] ?></span>
          </p>
          <p>
            <span style="display: inline-block; width: 28%; font-size: 20px;">Фамилия:</span>
            <span style="display: inline-block; width: 70%;"><?php echo $member['surname'] ?></span>
            </p>
        </section>

        <section class="general clearfix">
          <h3>Общие вопросы</h3>

          <div class="column" style="padding-top: 0;">

            <div class="group">
              <input type="text" name="city" value="<?php echo $member['city'] ?>"><span class="bar"></span>
              <label>В каком городе ты живешь?</label>
            </div>

            <!-- <div class="group"> -->
            <p>Удобные единицы измерения</p>
              <div class="rkmd-radio radio-ripple input-ripple">
              <label class="input-radio input-checkbox-radio radio-aquamarine">
                <input type="radio" name="radio-measure" id="measure_1" value="кг">
                <span class="radio"></span>
              </label>
              Килограммы
            </div>

            <div class="rkmd-radio radio-ripple input-ripple">
              <label class="input-radio input-checkbox-radio radio-aquamarine">
                <input type="radio" name="radio-measure" id="measure_2" value="lb">
                <span class="radio"></span>
              </label>
              Фунты
            </div>
          <!-- </div> -->

            <div class="group">
              <input type="text" value="<?php echo $member['smoke'] ?>" name="smoke"><span class="bar"></span>
              <label>Куришь ли ты?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['alcohol'] ?>" name="alcohol"><span class="bar"></span>
              <label>Употребляешь алкоголь?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['children'] ?>" name="children"><span class="bar"></span>
              <label>Есть ли у тебя дети? Сколько?</label>
            </div>
          </div>
          
          <div class="column">
            
            <div class="group">
              <input type="text" name="age" value="<?php echo Common::isVal($member['age']) ?>"><span class="bar"></span>
              <label>Сколько тебе лет?</label>
            </div>

            <div class="group">
              <input type="text" name="height" value="<?php echo Common::isVal($member['height']) ?>"><span class="bar"></span>
              <label>Рост (см)</label>
            </div>

            <div class="group">
              <input type="text" name="weight" value="<?php echo Common::isVal($member['weight']) ?>"><span class="bar"></span>
              <label>Вес (кг или lb - укажи далее)</label>
            </div>

            <div class="group">
              <input type="text" name="chest" value="<?php echo Common::isVal($member['chest']) ?>"><span class="bar"></span>
              <label>Обхват груди (см)</label>
            </div>

            <div class="group">
              <input type="text" name="waist" value="<?php echo Common::isVal($member['waist']) ?>"><span class="bar"></span>
              <label>Обхват талии (см)</label>
            </div>

            <div class="group">
              <input type="text" name="hip" value="<?php echo Common::isVal($member['hip']) ?>"><span class="bar"></span>
              <label>Обхват бедер (см)</label>
            </div>
          </div>


          <div class="column" style="padding-top: 0;">

            <div class="group">
              <input type="number" value="<?php echo Common::isVal($member['perWeek']) ?>" name="perweek" min="1" max="7"><span class="bar"></span>
              <label>Сколько дней в неделю будешь заниматься? <br>(Рекомендую 3, но не более 4-х)</label>
            </div>

            <p>Какой режим тренировок расчитывать?</p>
            <div class="rkmd-radio radio-ripple input-ripple">
              <label class="input-radio input-checkbox-radio radio-aquamarine">
                <input type="radio" name="radio-general" id="exPlace_1" value="Программа для дома">
                <span class="radio"></span>
              </label>
              Программа для дома
            </div>

            <div class="rkmd-radio radio-ripple input-ripple">
              <label class="input-radio input-checkbox-radio radio-aquamarine">
                <input type="radio" name="radio-general" id="exPlace_2" value="Программа для зала">
                <span class="radio"></span>
              </label>
              Программа для зала
            </div>

            <div class="rkmd-radio radio-ripple input-ripple">
              <label class="input-radio input-checkbox-radio radio-aquamarine">
                <input type="radio" name="radio-general" id="exPlace_3" value="Программа для дома и зала">
                <span class="radio"></span>
              </label>
              Программа для дома и зала
            </div>

            <!-- <p>Сколько дней в неделю будешь заниматься? <br>(Рекомендую 3, но не более 4-х)</p>
            <div class="group">
              <select name="perweek" id="sources-day" class="custom-select sources" placeholder="занятий/нед">
                <option id="perWeek_1" value="1 день">1 день</option>
                <option id="perWeek_2" value="2 дня">2 дня</option>
                <option id="perWeek_3" value="3 дня" >3 дня</option>
                <option id="perWeek_4" value="4 дня">4 дня</option>
                <option id="perWeek_5" value="5 дней">5 дней</option>
                <option id="perWeek_6" value="6 дней">6 дней</option>
                <option id="perWeek_7" value="7 дней">7 дней</option>
              </select>
            </div> -->

            <div class="group">
              <textarea name="T1"><?php echo $member['T1'] ?></textarea><span class="bar"></span>
              <label>Есть ли дома кардиотренажер? <br>Какой спортинвентарь у тебя есть, я постараюсь включить его в программу</label>
            </div>
          </div>
        </section>

        <section class="health clearfix">
          <h3>О здоровье</h3>

          <div class="column">
            <div class="group">
              <input type="text" value="<?php echo $member['H1'] ?>" name="H1"><span class="bar"></span>
              <label>Теряла ли ты когда-нибудь сознание? Во время тренировок или по какой-то другой причине?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['H2'] ?>" name="H2"><span class="bar"></span>
              <label>Давление обычно: нормальное, пониженное, повышенное?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['H3'] ?>" name="H3"><span class="bar"></span>
              <label>Есть ли хронические заболевания? (Например, давление, диабет, рак, высокий холестерин)?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['H4'] ?>" name="H4"><span class="bar"></span>
              <label>Принимаешь ли какие-либо лекарства? Какие?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['H5'] ?>" name="H5"><span class="bar"></span>
              <label>Были ли операции? Когда и почему?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['H6'] ?>" name="H6"><span class="bar"></span>
              <label>Нет ли противопоказаний для тренировок?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['H7'] ?>" name="H7"><span class="bar"></span>
              <label>Постоянный ли цикл месячных?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['H8'] ?>" name="H8"><span class="bar"></span>
              <label>Пропадали ли месячные после какого-то питания и нагрузок?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['H9'] ?>" name="H9"><span class="bar"></span>
              <label>Понимашь ли ты, что цикл может запаздывать из-за кардинальной смены деятельности (с дивана в зал)?</label>
            </div>

          </div>

          <div class="column">
            <div class="group">
              <input type="text" value="<?php echo $member['H10'] ?>" name="H10"><span class="bar"></span>
              <label>Есть ли особые жалобы на суставы или кости, которые возникают именно при занятиях спортом?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['H11'] ?>" name="H11"><span class="bar"></span>
              <label>Случалось ли испытывать боль в груди во время тренировок?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['H12'] ?>" name="H12"><span class="bar"></span>
              <label>Возникает ли боль в груди при отсутствии тренировок? Возникает ли боль в груди по какой-то другой причине?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['H13'] ?>" name="H13"><span class="bar"></span>
              <label>В каких местах возникает боль при выполнении упражнений?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['H14'] ?>" name="H14"><span class="bar"></span>
              <label>Какие это упражнения?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['H15'] ?>" name="H15"><span class="bar"></span>
              <label>Есть ли сколиоз?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['H16'] ?>" name="H16"><span class="bar"></span>
              <label>Были ли когда-то переломы, травмы? Какие и когда были?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['H17'] ?>" name="H17"><span class="bar"></span>
              <label>Принимаешь ли ты витамины? Какие?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['H18'] ?>" name="H18"><span class="bar"></span>
              <label>Когда ты последний раз посещала терапевта, сдавала кровь? (Если давно, то рекомендую сдать анализы и провериться)</label>
            </div>
          </div>
        </section>

        <section class="lifestyle clearfix">
          <h3>Образ жизни</h3>
          <div class="column">
            <div class="group">
              <input type="text" value="<?php echo $member['L1'] ?>" name="L1" value="<?php echo $member['L1'] ?>"><span class="bar"></span>
              <label>Профессия? Образ жизни</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['L2'] ?>" name="L2" value="<?php echo $member[''] ?>"><span class="bar"></span>
              <label>Сколько часов в день ты сидишь?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['L3'] ?>" name="L3"><span class="bar"></span>
              <label>Какие у тебя хобби?</label>
            </div>

            <div class="group">
              <input value="<?php echo $member['L4'] ?>" type="text" name="L4"><span class="bar"></span>
              <label>Сколько воды выпиваешь за день, не считая кофе и чай?</label>
            </div>

            <div class="group">
              <input value="<?php echo $member['L5'] ?>" type="text" name="L5"><span class="bar"></span>
              <label>Занимаешься ли ты спортом (теннис, плаванье, футбол)</label>
            </div>

            <div class="group">
              <input value="<?php echo $member['L6'] ?>" type="text" name="L6"><span class="bar"></span>
              <label>Какую обувь ты носишь на работу?</label>
            </div>
          </div>
          <div class="column">
            <div class="group">
              <input value="<?php echo $member['L7'] ?>" type="text" name="L7"><span class="bar"></span>
              <label>Возникают ли у тебя стрессы на работе или дома?</label>
            </div>

            <div class="group">
              <input value="<?php echo $member['L8'] ?>" type="text" name="L8"><span class="bar"></span>
              <label>Сколько часов ты спишь?</label>
            </div>

            <div class="group">
              <input value="<?php echo $member['L9'] ?>" type="text" name="L9"><span class="bar"></span>
              <label>Стаж тренировок в зале/дома (сроки). Сколько лет без перерывов </label>
            </div>

            <div class="group column-half">
              <input value="<?php echo $member['L10'] ?>" type="text" name="L10"><span class="bar"></span>
              <label>Есть ли командировки или частые дальние поездки?</label>
            </div>

            <div class="group column-half">
              <input value="<?php echo $member['L11'] ?>" type="text" name="L11"><span class="bar"></span>
              <label>Ты домохозяйка?</label>
            </div>
          </div>
        </section>

        <section class="about clearfix">
          <h3>Рассказ о себе</h3>
          <div class="column">
            <div class="group">
              <textarea name="S1"><?php echo $member['S1'] ?></textarea><span class="bar"></span>
              <label>Расскажи о себе: характер, привычки, режим, стиль жизни, убеждения, все, что ты считаешь нужным, что я должна знать о тебе</label>
            </div>
          </div>
          <div class="column">
            <div class="group">
              <textarea name="S2"><?php echo $member['S2'] ?></textarea><span class="bar"></span>
              <label>Опиши свой рацион в течение дня. Укажи калораж</label>
            </div>

            <div class="group">
              <textarea name="S3"><?php echo $member['S3'] ?></textarea><span class="bar"></span>
              <label>Любимые продукты, от которых у тебя "срывает" голову?</label>
            </div>
          </div>
        </section>

        <section class="activity clearfix">
          <h3>Оценка твоей активности</h3>
          <p>Под физической активностью подразумевается все, что угодно (танцы, прогулки, спорт) по меньшей мере 20 минут 3-5 раз в неделю. <br>Под правильным питанием понимается еда без бутербродов, алкоголя, сладостей, пищевого мусора.</p>

          <div class="rkmd-radio radio-ripple input-ripple">
            <label class="input-radio input-checkbox-radio radio-aquamarine">
              <input type="radio" name="radio-activity" id="activity_1" value="Я не активна физически, не ем правильно" >
              <span class="radio"></span>
            </label>
            Я не активна физически, не ем правильно
          </div>

          <div class="rkmd-radio radio-ripple input-ripple">
            <label class="input-radio input-checkbox-radio radio-aquamarine">
              <input type="radio" name="radio-activity" id="activity_2" value="Я не активна физически, но стараюсь питаться правильно">
              <span class="radio"></span>
            </label>
            Я не активна физически, но стараюсь питаться правильно
          </div>

          <div class="rkmd-radio radio-ripple input-ripple">
            <label class="input-radio input-checkbox-radio radio-aquamarine">
              <input type="radio" name="radio-activity" id="activity_3" value="Я активна физически, но не ем правильно, и готова начать заниматься и правильно питаться">
              <span class="radio"></span>
            </label>
            Я активна физически, но не ем правильно, и готова начать заниматься и правильно питаться
          </div>

          <div class="rkmd-radio radio-ripple input-ripple">
            <label class="input-radio input-checkbox-radio radio-aquamarine">
              <input type="radio" name="radio-activity" id="activity_4" value="Я уже последние 6 месяцев активно занимаюсь и пытаюсь правильно питаться">
              <span class="radio"></span>
            </label>
            Я уже последние 6 месяцев активно занимаюсь и пытаюсь правильно питаться
          </div>

          <div class="rkmd-radio radio-ripple input-ripple">
            <label class="input-radio input-checkbox-radio radio-aquamarine">
              <input type="radio" name="radio-activity" id="activity_5" value="Я физически активна и правильно питаюсь больше 6 месяцев">
              <span class="radio"></span>
            </label>
            Я физически активна и правильно питаюсь больше 6 месяцев
          </div>
        </section>

        <section class="target clearfix">
          <h3>Твои цели (в спорте и питании)</h3>

          <div class="group">
            <input value="<?php echo $member['G1'] ?>" type="text" name="G1"><span class="bar"></span>
            <label>Текущая ситуация? (Пример: сижу в офисе, вешу 100 кг, хочу похудеть)</label>
          </div>

          <div class="group">
            <input type="text" value="<?php echo $member['G2'] ?>" name="G2"><span class="bar"></span>
            <label>Краткосрочная цель? (Пример, бегать по 30 мин 3 раза в неделю или сократить калораж на 500 ккал)</label>
          </div>

          <div class="group">
            <input type="text" value="<?php echo $member['G3'] ?>" name="G3"><span class="bar"></span>
            <label>Долгосрочная цель? (Пример: потерять 50 кг за год, пробежать марафон через год)</label>
          </div>
        </section>

        <section class="nutrition clearfix">
          <h3>Твои пожелания к питанию</h3>
          <p>Ты можешь выбрать любой план, все они эффективны. Внимательно прочитай особенности каждого типа питания</p>

          <div class="column">
            <p>Какое ты хочешь подобрать питание?</p>

            <div class="rkmd-radio radio-ripple input-ripple">
              <label class="input-radio input-checkbox-radio radio-aquamarine">
                <input type="radio" name="radio-nutrition" id="nutrilon_1" value="Строгое (чистое, правильное)">
                <span class="radio"></span>
              </label>
              <p>Строгое (чистое, правильное)</p>
            </div>

            <div class="rkmd-radio radio-ripple input-ripple">
              <label class="input-radio input-checkbox-radio radio-aquamarine">
                <input type="radio" name="radio-nutrition" id="nutrilon_2" value="Строгое, но я оставлю любимые продукты, без которых я жить точно не смогу">
                <span class="radio"></span>
              </label>
              <p>Строгое, но я оставлю любимые продукты, без которых я жить точно не смогу</p>
            </div>

            <div class="rkmd-radio radio-ripple input-ripple">
              <label class="input-radio input-checkbox-radio radio-aquamarine">
                <input type="radio" name="radio-nutrition" id="nutrilon_3" value="Привычное мне. Хочу доказать, что я похудею и сделаю качественное тело на супах, вине, бутербродах и шоколаде">
                <span class="radio"></span>
              </label>
              <p>Привычное мне. Хочу доказать, что я похудею и сделаю качественное тело на супах, вине, бутербродах и шоколаде</p>
            </div>

          </div>
          <div class="column">
            <p>Выбери тип питания</p>

            <div class="rkmd-radio radio-ripple input-ripple">
              <label class="input-radio input-checkbox-radio radio-aquamarine">
                <input type="radio" name="radio-nutrition-type" id="nutriType_1" value="Низкоуглеводный (высокожировой)">
                <span class="radio"></span>
              </label>
              <p>Низкоуглеводный (высокожировой) -  обеспечен быстрый результат за 12 недель</p>

              <p><span>Плюсы:</span> <span>быстрое похудение</span></p>
              <p><span>Минусы:</span> <span>нельзя держать дольше 3-х месяцев не в ущерб здоровью</span></p>
            </div>

            <div class="rkmd-radio radio-ripple input-ripple">
              <label class="input-radio input-checkbox-radio radio-aquamarine">
                <input type="radio" name="radio-nutrition-type" id="nutriType_2" value="Питание по соматотипу">
                <span class="radio"></span>
              </label>
              <p>Питание по соматотипу (в зависимости от типа фигуры)</p>

              <p><span>Плюсы:</span> <span>учитываются генетические особенности организма</span></p>
              <p><span>Минусы:</span> <span>существующие методы определения соматотипа слишком обобщенные и не персонализированные</span></p>
            </div>

            <div class="rkmd-radio radio-ripple input-ripple">
              <label class="input-radio input-checkbox-radio radio-aquamarine">
                <input type="radio" name="radio-nutrition-type" id="nutriType_3" value="Изокалорийный">
                <span class="radio"></span>
              </label>
              <p>Изокалорийный (+/- 300-500 ккал для снижения или повышения веса)</p>

              <p><span>Плюсы:</span> <span>комфортный, щадящий тип питания</span></p>
              <p><span>Минусы:</span> <span>не рассчитан на быстрое похудение</span></p>
            </div>

          </div>
        </section>

        <section class="work clearfix">
          <h3>Твои пожелания к работе в целом</h3>
          <p>Если ты просто худеешь, то ни о каком рельефе речи не идет. <br>
          Этапы просты как мир: сначала похудение, потом набор мышц за счет массы, потом уже рельеф</p>

          <div class="column">
            <p>Когда планируешь тренироваться?</p>

            <div class="rkmd-radio radio-ripple input-ripple">
              <label class="input-radio input-checkbox-radio radio-aquamarine">
                <input type="radio" name="radio-time" id="exTime_1" value="Утром">
                <span class="radio"></span>
              </label>
              Утром
            </div>

            <div class="rkmd-radio radio-ripple input-ripple">
              <label class="input-radio input-checkbox-radio radio-aquamarine">
                <input type="radio" name="radio-time" id="exTime_2" value="Вечером">
                <span class="radio"></span>
              </label>
              Вечером
            </div>
          </div>

          <div class="column">
            <div class="group">
              <input type="text" value="<?php echo $member['W2'] ?>" name="W2"><span class="bar"></span>
              <label>Есть возможность на работе есть из лоточков или придется меню подстраивать под столовую?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['W3'] ?>" name="W3"><span class="bar"></span>
              <label>Нет никаких препятствий носить с собой еду, заготовленную с вечера 3 месяца?</label>
            </div>
          </div>
        </section>

<!-- 
 #####   #    #    #       ###   ######   ####
   #     ##  ##    #      #   #  #       #    #
   #     # ## #   ###    #       #       #
   #     #    #   # #    #  ###  ####     ####
   #     #    #  #####   #    #  #            #
   #     #    #  #   #    #   #  #       #    #
 #####   #    # ##   ##    ####  ######   ####

 -->
        <section class="gallery">
          <h3>Фотографии до начала тренировок</h3>
          <p>Прикрепи свои фотографии в полный рост в нижнем белье: спереди, сзади и сбоку</p>
          <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
          <!-- <p style="font-size: 20px;"><span style="display: inline-block; width: 140px;">Аватарка:</span><input style="display: inline-block; margin-left: 20px; font-size: 16px;" type="file" name="avatar" /></p> -->
          <p style="font-size: 20px;"><span style="display: inline-block; width: 140px;">Вид спереди:</span><input style="display: inline-block; margin-left: 20px; font-size: 16px;" type="file" name="front" /></p>
          <p style="font-size: 20px;"><span style="display: inline-block; width: 140px;">Вид сзади:</span><input style="display: inline-block; margin-left: 20px; font-size: 16px;" type="file" name="back" /></p>
          <p style="font-size: 20px;"><span style="display: inline-block; width: 140px;">Вид сбоку:</span><input style="display: inline-block; margin-left: 20px; font-size: 16px;" type="file" name="side" /></p>

<?php 
// $thedir = BASE_DOMAIN . '/template/img/members/' . $id . '/';
// $src = THE_DOMAIN . '/template/img/members/' . $id . '/';
// // echo $thedir;
// if ($handle = opendir($thedir)) {
//     // echo "Дескриптор каталога: $handle\n";
//     // echo "Записи:\n";

//     /* Именно этот способ чтения элементов каталога является правильным. */
//     while (false !== ($entry = readdir($handle))) {
//         // echo "$entry\n";
//       if (fnmatch("avatar-*", $entry )) {
//         // echo 'Hi........';
//         echo '<img src="' . $src . $entry . '" alt="Аватарка-' . $id . '" />';
//       }
// // if (!fnmatch("avatar([\-A-Za-zА-Яа-яЁё0-9]+)", $entry)) {
// //   echo "нашли аватарку ..." . $entry;
// // }
//     }

//     // /* Это НЕВЕРНЫЙ способ обхода каталога. */
//     // while ($entry = readdir($handle)) {
//     //     echo "$entry\n";
//     // }

//     closedir($handle);
// }



 ?>

           <!-- <img src="/template/img/members/<?php echo $id ?>/<?php echo glob('avatar.*') ?>" alt="placeholder+image"> -->
          <!-- <div id="fine-uploader-gallery"></div> -->
          <!-- шаблон разметки для загруженных фото -->
          <!-- <script type="text/template" id="qq-template-gallery">
            <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Переместите сюда файлы">
                <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                    <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
                </div>
                <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                    <span class="qq-upload-drop-area-text-selector"></span>
                </div>
                <div class="qq-upload-button-selector qq-upload-button btn-default btn-default-white waves waves-effect waves-grey">
                    <div>Добавить</div>
                </div>
                <span class="qq-drop-processing-selector qq-drop-processing">
                    <span>Файлы загружаются</span>
                    <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
                </span>
                <ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
                    <li>
                        <div class="qq-thumbnail-wrapper">
                            <img class="qq-thumbnail-selector" qq-server-scale>
                        </div>
                        <button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>
                    </li>
                </ul>

                <dialog class="qq-alert-dialog-selector">
                    <div class="qq-dialog-message-selector"></div>
                    <div class="qq-dialog-buttons">
                        <button type="button" class="qq-cancel-button-selector">Закрыть</button>
                    </div>
                </dialog>

                <dialog class="qq-confirm-dialog-selector">
                    <div class="qq-dialog-message-selector"></div>
                    <div class="qq-dialog-buttons">
                        <button type="button" class="qq-cancel-button-selector">Нет</button>
                        <button type="button" class="qq-ok-button-selector">Да</button>
                    </div>
                </dialog>

                <dialog class="qq-prompt-dialog-selector">
                    <div class="qq-dialog-message-selector"></div>
                    <input type="text">
                    <div class="qq-dialog-buttons">
                        <button type="button" class="qq-cancel-button-selector">Отмена</button>
                        <button type="button" class="qq-ok-button-selector">Да</button>
                    </div>
                </dialog>
            </div>
          </script> -->
          <!-- end шаблон разметки для загруженных фото -->


        </section>

        <section class="agreement clearfix">
          <h3>Согласие на работу со мной</h3>

          <div class="column">
            <div class="group">
              <input type="text" value="<?php echo $member['P1'] ?>" name="P1"><span class="bar"></span>
              <label>Осознаешь ли ты, что при отсутствии живого тренера рядом вся техника безопасности ложится на твои плечи?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['P2'] ?>" name="P2"><span class="bar"></span>
              <label>Обещаешь ли оповещать меня о головокружениях, аллергиях, обмороках, дискомфортах (запоры, поносы, и т.д), которые тебя беспокоят?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['P3'] ?>" name="P3"><span class="bar"></span>
              <label>Обязуешься ли ты не публиковать эту программу и не передавать третим лицам?</label>
            </div>
          </div>

          <div class="column">
            <div class="group">
              <input type="text" value="<?php echo $member['P4'] ?>" name="P4"><span class="bar"></span>
              <label>Осознаешь ли ты, что в питании трудно изобрести велосипед, и построить тело можно только преверенными методами?</label>
            </div>

            <div class="group">
              <input type="text" value="<?php echo $member['P5'] ?>" name="P5"><span class="bar"></span>
              <label>Понимаешь ли ты, что обращаешься за программой к тренеру, который полностью доверят представленной тобой информации?</label>
            </div>
          </div>
        </section>

        <section class="final clearfix">
          <div class="column">
            <h3>Поздравляю! Самая скучная часть работы закончилась!</h3>
            <p>В течение 3-х суток я рассмотрю твою анкету, подготовлю персональную тренировку и план питания, которые ты увидишь в личном кабинете. </p>

            <p>А пока проверь, что у тебя имеются дома:</p>
            <ul>
              <li>Пищевые пластиковые контейнеры</li>
              <li>Пароварка или мультиварка или духовка, а также набор кастрюль</li>
              <li>Кухоннные весы</li>
            </ul>
            <p>До связи!</p>

            <!-- <input id="submit_btn" type="submit" class="btn-default waves waves-effect waves-light" value="Отправить анкету"> -->
            <a href="javascript:void(0)" id="questionnareSubmit" class="btn-default waves waves-effect waves-light">Отправить анкету</a>
          </div>
        </section>
      </form>
      <!-- <section class="final clearfix">
        <a href="javascript:void(0)" id="questionnareSubmit" class="btn-default waves waves-effect waves-light">Отправить анкету</a>
      </section> -->
    </div>
  </div>
   <!-- End Основной контент странички -->
  
<?php include(BASE_DOMAIN . '/views/footer.php');?>