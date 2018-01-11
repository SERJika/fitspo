<?php include(BASE_DOMAIN . '/views/header.php');?>

  <!-- Основной контент странички -->
  <div class="page single-page-user-setting lk-user-report">
    <div class="container-fluid">
      <div class="row page-info-user">

        <div class="col-xs-13 col-sm-6">
          <ul class="breadcrumbs">
            <li class="active">Отчеты</li>
          </ul>

          <h1 class="page-title">Отчеты</h1>
        </div>
      </div>

      <div class="row page-text-content page-content-report">
        <!-- Табы -->
        <div class="col-xs-13 tabs">
          <ul class="tabs__caption">
            <li class="active">Ежедневный отчет</li>
            <li>Итоговый отчет</li>
          </ul>

          <div class="tabs__content active">
            <form class="row">

              <div class="col-xs-13 col-sm-7 col-md-6">
                <div class="form-group">
                  <span class="start-datepicker">Дата отчета</span>
                  <div class="input-date-control">
                    <input class="datepicker form-control" type="text" value="15.07.2016"/>
                    <span class="caret"></span>
                  </div>
                </div>
              </div>

              <div class="col-xs-13 column-food">
                <h2>Питание (перечисли какие продукты употребляла)</h2>

                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Завтрак</label>
                </div>

                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Перекус 1 (утром)</label>
                </div>

                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Обед</label>
                </div>

                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Перекус 2 (после обеда)</label>
                </div>

                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Ужин</label>
                </div>

                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Примечание (Если ты съела что-то лишнее, напиши что, когда и какие эмоции испытывала в этот момент)</label>
                </div>

                <div class="group">
                  <textarea></textarea><span class="bar"></span>
                  <label>Спортивное питание (Напиши что принимала в этот день)</label>
                </div>

                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Какие витамины принимала (например, рыбий жир, мультитабс)</label>
                </div>
              </div>

              <div class="col-xs-13 column-third">
                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Сколько воды выпила (л)</label>
                </div>
              </div>

              <div class="col-xs-13 column-third">
                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Ккал за день по питанию</label>
                </div>
              </div>

              <div class="col-xs-13 column-third">
                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Ккал за день сожгла за тренировку</label>
                </div>
              </div>

              <div class="col-xs-13 column-third">
                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Сколько белков за день (гр)</label>
                </div>
              </div>

              <div class="col-xs-13 column-third">
                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Сколько жиров за день (гр)</label>
                </div>
              </div>

              <div class="col-xs-13 column-third">
                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Сколько углеводов за день (гр)</label>
                </div>
              </div>

              <div class="col-xs-13">
                <h2>Самочувствие</h2>
                <p>По шкале от 0 до 5 отметь следующее:</p>

                <ul class="health-list">
                  <li>
                    <span class="health-title">Аппетит</span>
                    <span>0 – нет аппетита, 5 – очень голодна</span>
                  </li>
                  <li>
                    <span class="health-title">Качество сна</span>
                    <span>0 – бессонница, 5 – отлично сплю</span>
                  </li>
                  <li>
                    <span class="health-title">Усталость</span>
                    <span>0 – не устала, 5  - измотана</span>
                  </li>
                  <li>
                    <span class="health-title">Желание тренироваться</span>
                    <span>0 – не хочу совсем, 5  - лечу на занятия</span>
                  </li>
                </ul>
              </div>

              <div class="col-xs-13 column-fourth">
                <div class="group">
                  <input type="number" min="0" max="5"><span class="bar"></span>
                  <label>Аппетит (от 0 до 5)</label>
                </div>
              </div>

              <div class="col-xs-13 column-fourth">
                <div class="group">
                  <input type="number" min="0" max="5"><span class="bar"></span>
                  <label>Сон (от 0 до 5)</label>
                </div>
              </div>

              <div class="col-xs-13 column-fourth">
                <div class="group">
                  <input type="number" min="0" max="5"><span class="bar"></span>
                  <label>Усталость (от 0 до 5)</label>
                </div>
              </div>

              <div class="col-xs-13 column-fourth">
                <div class="group">
                  <input type="number" min="0" max="5"><span class="bar"></span>
                  <label>Желание тренироваться (от 0 до 5)</label>
                </div>
              </div>

              <div class="col-xs-13 pulse">
                <h2>Пульс</h2>
                <p>Зафиксируй пульс сразу после пробуждения. <br>На запястье подержи палец 15 секунд, считая удары, а потом умножь кол-во ударов на 4</p>

                <div class="column-fourth">
                  <div class="group">
                    <input type="number" min="0"><span class="bar"></span>
                    <label>Пульс (ударов в минуту)</label>
                  </div>
                </div>
              </div>

            </form>
          </div>

          <div class="tabs__content">
            <form class="row">

              <div class="col-xs-13 col-sm-7 col-md-6">
                <div class="form-group">
                  <span class="start-datepicker">Дата отчета</span>
                  <div class="input-date-control">
                    <input class="datepicker form-control" type="text" value="15.07.2016"/>
                    <span class="caret"></span>
                  </div>
                </div>
              </div>

              <h2 class="col-xs-13">Общая информация</h2>

              <div class="col-xs-13 column-third">
                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Вес (кг)</label>
                </div>
              </div>

              <div class="col-xs-13 column-third">
                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Объем груди (см)</label>
                </div>
              </div>

              <div class="col-xs-13 column-third">
                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Объем талии (см)</label>
                </div>
              </div>

              <div class="col-xs-13 column-third">
                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Объем бедер (см)</label>
                </div>
              </div>

              <div class="col-xs-13 column-third">
                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Объем плеча (см)</label>
                </div>
              </div>

              <div class="col-xs-13 column-third">
                <div class="group">
                  <input type="text"><span class="bar"></span>
                  <label>Объем бедра (см)</label>
                </div>
              </div>

              <div class="col-xs-13 info-column">

                <div class="group info-progress">
                  <textarea></textarea><span class="bar"></span>
                  <label>Что поменялось в зеркале? Опиши, видишь ли прогресс. Как и что изменилось</label>
                </div>

                <div class="group info-training">
                  <textarea></textarea><span class="bar"></span>
                  <label>Как проходят тренировки? Становишься ли ты сильнее, выносливее? Что ты чувствуешь во время тренировки? Опиши проблемы или непонятные чувств</label>
                </div>

                <div class="group info-food">
                  <textarea></textarea><span class="bar"></span>
                  <label>Как проходит питание по плану? Легко ли следовать инструкциям? Легко ли отказаться от вредностей? Поддерживает ли семья? Сколько раз в неделю ты закупаешь продукты? Сколько раз  в неделю ты ешь в ресторанах? Есть ли вздутие, запоры, задержки?</label>
                </div>
              </div>

              <div class="col-xs-13 photo-column">
                <h2>Фотографии на дату отчета</h2>
                <p>Прикрепи свои фотографии в полный рост в нижнем белье: спереди, сзади и сбоку</p>

                <label class="label-files btn-default btn-default-white waves waves-effect waves-grey">Добавить
                  <input type="file" id="files" name="files[]" multiple />
                </label>
                <output id="list"></output>
              </div>

              <div class="col-xs-13">
                <h2>Вопросы к тренеру</h2>

                <div class="group">
                  <textarea></textarea><span class="bar"></span>
                  <label>Сообщение</label>
                </div>
              </div>

            </form>

          </div>
        </div>
        <!-- end Табы -->
      </div>

      <div class="row page-text-comments">
        <form>
          <div class="row">
            <div class="col-xs-13">
              <h2>Написать сообщение тренеру</h2>

              <div class="group">
                <textarea></textarea><span class="bar"></span>
                <label>Сообщение</label>
              </div>

               <input type="submit" class="btn-default waves waves-effect waves-light" value="Отправить">
            </div>
          </div>
        </form>

      </div>

    </div>
  </div>
   <!-- End Основной контент странички -->

<?php include(BASE_DOMAIN . '/views/footer.php');?>