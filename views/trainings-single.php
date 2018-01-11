<?php include(BASE_DOMAIN . '/views/header.php');?>

  <!-- Основной контент странички -->
  <div class="page page-training">
    <div class="page-content container-fluid">
      <div class="row page-info-training">

        <div class="col-xs-13">
          <ul class="breadcrumbs">
            <li><a href="praxis.html">План тренировок</a></li>
            <li class="active">Стандартный режим в зале</li>
          </ul>
        </div>

        <div class="col-xs-13">
          <h1 class="page-title">Стандартный режим в зале</h1>
        </div>
      </div>

      <div class="row page-training-content plan-training-content">
        <form class="col-xs-13 form-praxis">
          <div class="row">
            <div class="col-xs-13 col-sm-5">
              <div class="group">
                <input type="text"><span class="bar"></span>
                <label>Название режима тренировок</label>
              </div>

              <div class="group group-comment">
                <input type="text"><span class="bar"></span>
                <label>Комментарий</label>
              </div>

              <div class="rkmd-radio radio-ripple input-ripple">
                <label class="input-radio input-checkbox-radio radio-aquamarine">
                  <input type="radio" name="radio" checked>
                  <span class="radio"></span>
                </label>
                Дома
              </div>

              <div class="rkmd-radio radio-ripple input-ripple">
                <label class="input-radio input-checkbox-radio radio-aquamarine">
                  <input type="radio" name="radio">
                  <span class="radio"></span>
                </label>
                В зале
              </div>

              <div class="rkmd-radio radio-ripple input-ripple">
                <label class="input-radio input-checkbox-radio radio-aquamarine">
                  <input type="radio" name="radio">
                  <span class="radio"></span>
                </label>
                Дома и в зале
              </div>

              <div class="toggle-block">
                <span>Основной режим тренировок</span>
                <input id="toogle" class="toggle-checkbox" type="checkbox" hidden="hidden">
                <label for="toogle" class="switch"></label>
                <p>Нет</p>
              </div>

            </div>
            <div class="col-xs-13 col-sm-7 col-sm-offset-1 add-training-column">
              <div class="buttons">
                <button class="btn-default btn-default-white waves waves-effect waves-grey add-training-btn">Добавить тренировку</button>
                <button class="btn-default waves waves-effect waves-light right-position">Сохранить</button>
              </div>

              <!-- Дефолтное состояние блока -->
              <div class="new-block-praxis">
                <select name="sources" id="sources" class="custom-select sources" placeholder="Выбери день недели">
                  <option value="Понедельник">Понедельник</option>
                  <option value="Вторник">Вторник</option>
                  <option value="Среда">Среда</option>
                  <option value="Четверг">Четверг</option>
                  <option value="Пятница">Пятница</option>
                  <option value="Суббота">Суббота</option>
                  <option value="Воскресенье">Воскресенье</option>
                </select>

                <div class="add-praxis">
                  <div class="praxis-info">
                    <span>Выбери тренировку <i class="material-icons">add</i></span>
                    <div class="praxis-name"></div>
                  </div>
                  <div class="praxis-icon">
                    <i class="material-icons">visibility</i>
                  </div>
                </div>
              </div>
               <!-- end Дефолтное состояние блока -->

              <!-- Просто для примера -->
              <div class="new-block-praxis">
                <select name="sources" id="sources" class="custom-select sources active" placeholder="Среда">
                  <option value="Понедельник">Понедельник</option>
                  <option value="Вторник">Вторник</option>
                  <option value="Среда" selected>Среда</option>
                  <option value="Четверг">Четверг</option>
                  <option value="Пятница">Пятница</option>
                  <option value="Суббота">Суббота</option>
                  <option value="Воскресенье">Воскресенье</option>
                </select>

                <div class="add-praxis active">
                  <div class="praxis-info" data-toggle="modal" data-target="#modalTraining">
                    <span>Выбери тренировку <i class="material-icons">add</i></span>
                    <div class="praxis-name">
                      <h4>Силовая тренировка в зале</h4>
                      <p>Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</p>
                    </div>
                  </div>
                  <div class="praxis-icon" data-toggle="modal" data-target="#modalTrainingButton">
                    <i class="material-icons">visibility</i>
                  </div>
                </div>
              </div>

              <div class="new-block-praxis">
                <select name="sources" id="sources" class="custom-select sources active" placeholder="Вторник">
                  <option value="Понедельник">Понедельник</option>
                  <option value="Вторник" selected>Вторник</option>
                  <option value="Среда">Среда</option>
                  <option value="Четверг">Четверг</option>
                  <option value="Пятница">Пятница</option>
                  <option value="Суббота">Суббота</option>
                  <option value="Воскресенье">Воскресенье</option>
                </select>

                <div class="add-praxis active">
                  <div class="praxis-info" data-toggle="modal" data-target="#modalTraining">
                    <span>Выбери тренировку <i class="material-icons">add</i></span>
                    <div class="praxis-name">
                      <h4>Силовая тренировка в зале</h4>
                      <p>Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</p>
                    </div>
                  </div>
                  <div class="praxis-icon" data-toggle="modal" data-target="#modalTrainingButton">
                    <i class="material-icons">visibility</i>
                  </div>
                </div>
              </div>

              <div class="new-block-praxis">
                <select name="sources" id="sources" class="custom-select sources active" placeholder="Понедельник">
                  <option value="Понедельник" selected>Понедельник</option>
                  <option value="Вторник">Вторник</option>
                  <option value="Среда">Среда</option>
                  <option value="Четверг">Четверг</option>
                  <option value="Пятница">Пятница</option>
                  <option value="Суббота">Суббота</option>
                  <option value="Воскресенье">Воскресенье</option>
                </select>

                <div class="add-praxis active">
                  <div class="praxis-info" data-toggle="modal" data-target="#modalTraining">
                    <span>Выбери тренировку <i class="material-icons">add</i></span>
                    <div class="praxis-name">
                      <h4>Силовая тренировка в зале</h4>
                      <p>Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</p>
                    </div>
                  </div>
                  <div class="praxis-icon" data-toggle="modal" data-target="#modalTrainingButton">
                    <i class="material-icons">visibility</i>
                  </div>
                </div>
              </div>
              <!-- end Просто для примера -->

            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
  <!-- End Основной контент странички -->

<?php include(BASE_DOMAIN . '/views/footer.php');?>