<?php include(BASE_DOMAIN . '/views/header.php');?>

  <!-- Основной контент странички -->
  <div class="page single-page-user-setting">
    <div class="container-fluid">
      <div class="row page-info-user">

        <div class="col-xs-13 col-sm-6">
          <ul class="breadcrumbs">
            <li><a href="/members">Участники</a></li>
            <li><?php echo $member['name'];?> <?php echo $member['surname'];?></li>
          </ul>

          <h1 class="page-title">Управление</h1>
        </div>

        <div class="col-xs-13 col-sm-6 menu-user-column right-position right">
          <div class="meta-user">
            <p class="name-user"><?php echo $member['name'];?> <?php echo $member['surname'];?></p>
            <a href="mailto:<?php echo $member['email'];?>" class="email-user"><?php echo $member['email'];?></a>
          </div>
          <div class="menu-user">
            <div class="photo">
              <?php echo Members::getAvatar($member);?>
            </div>
            <button><i class="material-icons">menu</i></button>
          </div>

          <div class="right-menu-block">
            <button class="close"><i class="material-icons">close</i></button>
            <ul>
              <li class="active">
                <a href="/members/member-<?php echo $member['id'];?>"><i class="material-icons">tune</i> Управление</a>
              </li>
              <li>
                <a href="single-user-report.html"><i class="material-icons">description</i> Отчеты</a>
              </li>
              <li>
                <a href="single-user-dashboard.html"><i class="material-icons">dashboard</i> Обзорная доска</a>
              </li>
              <li>
                <a href="single-user-plan.html"><i class="material-icons">accessibility</i> План тренировок</a>
              </li>
              <li>
                <a href="single-user-food.html"><i class="material-icons">room_service</i> План питания</a>
              </li>
              <li>
                <a href="<?php echo THE_DOMAIN . 'members/profile-' . $member['id'] ?>"><i class="material-icons">list</i> Анкета</a>
              </li>
            </ul>
          </div>

        </div>
      </div>

      <div class="row page-content">
        <div class="user-info">
          <h3>Личная информация</h3>
          <div class="meta-user-media">
            <div class="photo">
              <?php echo Members::getAvatar($member);?>
            </div>

            <div class="meta-user-name">
              <p class="name-user"><?php echo $member['name'];?> <?php echo $member['surname'];?></p>
              <a href="mailto:alex-mirosha@mail.ru" class="email-user"><?php echo $member['email'];?></a>

              <!-- <button class="btn-modal btn-default waves waves-effect waves-light" data-toggle="modal" data-target="#modalMessage">Написать сообщение</button> -->


              <!-- Модальное окно -->
              <form class="modal animation-scale-up" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="modalMessageLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="material-icons close" data-dismiss="modal" aria-hidden="true">close</button>
                      <h4 class="modal-title" id="modalMessageLabel">Написать сообщение { в разработке }</h4>
                    </div>

                    <div class="modal-body">
                      <div class="group">
                        <textarea></textarea><span class="bar"></span>
                        <label>Сообщение</label>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <input type="submit" class="btn-default waves waves-effect waves-light" value="Отправить">
                    </div>

                  </div>
                </div>
              </form>
              <!-- end Модальное окно -->


            </div>
          </div>

          <ul class="meta-user-info">
            <li>
              <span>Возраст</span>
              <p><?php echo $member['age'];?></p>
            </li>
            <li>
              <span>Город</span>
              <p><?php echo $member['city'];?></p>
            </li>
            <li>
              <span>Дата активации</span>
              <p><?php echo $member['activationDate'];?></p>
            </li>
            <li>
              <span>Комментарий</span>
              <p><?php echo $member['coachComment'];?></p>
            </li>
          </ul>

      <div class="margin-top--10">
        <!-- <div class="user-info"> -->
        <a href="<?php echo THE_DOMAIN . 'members/get_profile-' . $member['id'] ?>/1" class="btn-flat waves-effect waves-grey">Посмотреть анкету</a>
        <!-- </div> -->
      </div>

      <!-- <div> -->
        <a href="<?php echo THE_DOMAIN . 'members/update_profile-' . $member['id'] ?>/0" class="btn-flat waves-effect waves-grey">Редактировать анкету</a>
      

          <!-- <button id="sendQuestions" class="btn-flat waves-effect waves-grey pull-right">Отправить анкету</button> -->

        <button class="btn-modal btn-default waves waves-effect waves-light right-position" id="sendQuestionnaire">Отправить анкету</button>
      <!-- </div> -->

        </div>

        <div class="account-info right-position">
          <h3>ИНФОРМАЦИЯ ОБ АККАУНТЕ</h3>
          <ul class="meta-user-info">
            <li>
              <span>Статус</span>
              <p>Активный</p>
            </li>
            <li>
              <span>Программа</span>
              <p><?php echo $member['title'] ?></p>
            </li>
            <li>
              <span>Группа</span>
              <p><span id="group_in"><?php echo $member['inGroup'] ?></span><span id="group_out" data-value="<?php echo $member['id'];?>">[ сбросить ]</span></p>
            </li>
            <li>
              <span>Старт группы</span>
              <p><?php echo $member['start'] ?></p>
            </li>
            <li>
              <span>Финиш группы</span>
              <p><?php echo $member['finish'];?></p>
            </li>
            <li>
              <span>Категория тренировок</span>
              <p><?php echo $member['trainMode'];?></p>
            </li>
            <li>
              <span>Количество тренировок</span>
              <p><?php echo $member['perWeek'];?></p>
            </li>
          </ul>

          <ul class="links">
            <li><a href="JAVASCRIPT:VOID(0);" STYLE="COLOR:GREY;">Настроить план тренировок { в разработке }</a></li>
            <li><a href="JAVASCRIPT:VOID(0);" STYLE="COLOR:GREY;">Настроить план питания { в разработке }</a></li>
          </ul>

          <button class="btn-modal btn-default waves waves-effect waves-light" data-toggle="modal" data-target="#modalUserEdit">Изменить</button>


          <!-- Модальное окно "Изменить" -->
          <form class="modal animation-scale-up" id="modalUserEdit" tabindex="1" role="dialog" aria-labelledby="modalUserLabel" aria-hidden="true" method="post">
            <div class="modal-dialog modal-programm">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="material-icons close" data-dismiss="modal" aria-hidden="true">close</button>
                  <h4 class="modal-title" id="modalUserLabel">Информация об участнике</h4>
                </div>

                <div class="modal-body">
                  <div class="row">
                    <div class="col-xs-13 col-sm-7">

                      <div class="group">
                        <?php //$nameStr = $member['name'] . ' ' . $member['surname'];?>
                        <input type="text" value="<?php Common::showSesVal('member', $nameStr, $nameStr);?>" id="membName"><span class="bar"></span>
                        <label>Имя Фамилия</label>
                      </div>

                      <div class="group">
                        <input type="email" value="<?php echo $member['email'];?>" id="membEmail"><span class="bar"></span>
                        <label>E-mail</label>
                      </div>

                      <div class="group">
                        <textarea id="membComment"><?php echo $member['coachComment'];?></textarea><span class="bar"></span>
                        <label>Комментарий</label>
                      </div>

                    </div>

                    <div class="col-xs-13 col-sm-6">
                      <div class="group">
                        <select name="sources" id="sources" class="custom-select sources" placeholder="Программа">
                        <?php foreach (Programs::getProgramsList() as $program):?>
                          <option<?php Common::checkSelected($program['id'], $member['program']); ?> value="<?php echo $program['title'];?>"><?php echo $program['title'];?></option>
                        <?php endforeach;?>
                        </select>
                      </div>

                      <div class="group">
                        <input type="text" value="<?php echo $member['inGroup'] ?>" id="membGr"><span class="bar"></span>
                        <label>Группа</label>
                      </div>

                      <!-- <script>
                        alert('<?php echo $member['title'] ?>');
              $("span.custom-select-trigger").text() = "<?php echo $member['title'] ?>"
                      </script> -->

                      <!-- <div class="toggle-block">
                        <span>Статус участника</span>
                        <input id="toogle" class="toggle-checkbox" type="checkbox" hidden="hidden">
                        <label for="toogle" class="switch"></label>
                        <p>Заморожен</p>
                        <span class="danger">Чтобы присвоить статус Активный, сначала добавь участника в группу</span>
                      </div>


                      <p class="extend">Продлить аккаунт</p>
                      <div class="rkmd-checkbox checkbox-ripple input-ripple">
                        <label class="input-checkbox input-checkbox-radio checkbox-aquamarine">
                          <input type="checkbox">
                          <span class="checkbox"></span>
                        </label>
                      </div> -->

                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button class="btn-flat waves-effect waves-grey close" data-dismiss="modal" aria-hidden="true">Отмена</button>
                  <input type="submit" id="changeMember" class="btn-flat waves-effect waves-grey" value="Сохранить" data-value="<?php echo $member['id'];?>">
                </div>

              </div>
            </div>
          </form>
          <!-- end Модальное окно -->


          <button class="btn-default waves waves-effect waves-light right-position" id="delMemb" data-value="<?php echo $member['id']; ?>">Удалить</button>
        </div>
<span id="getPDF" data-value="<?php echo $member['id'];?>">PDF</span>
<!-- <a href="javascript:void(0);" target="_blank" id="getPDF">PDF</a> -->

      </div>
    </div>
  </div>
   <!-- End Основной контент странички -->

<?php include(BASE_DOMAIN . '/views/footer.php');?>