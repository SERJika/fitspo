<?php include(BASE_DOMAIN . '/views/header.php');?>

<!-- Контент страницы -->
  <div class="page page-user">
    <div class="page-content container-fluid">
      <div class="row page-info">

        <div class="col-xs-13">
          <ul class="breadcrumbs">
            <li class="active">Участники</li>
          </ul>
        </div>

        <div class="col-xs-13">
          <h1 class="page-title">Участники</h1>
        </div>
      </div>


      <!-- Табличка -->
      <div class="row page-user-content">
        <div class="table-wrapper" data-mcs-theme="dark-3">
          <div class="table-content table-users">
            <div class="table-row">
              <div class="table-th"></div>
              <div class="table-th table-user">Участники</div>
              <div class="table-th table-group">№ гр.</div>
              <div class="table-th table-start">Старт</div>
              <div class="table-th table-finish">Финиш</div>
            </div>

            <?php foreach ($members as $member): ?>
            <div class="table-row">
              <div class="table-td table-image">
                <a href="/members/member-<?php echo $member['id'];?>" class="user-img circle">
                  <?php echo Members::getAvatar($member);?>
                </a>
              </div>

              <div class="table-td table-name">
                <a href="/members/member-<?php echo $member['id'];?>">
                  <span class="name"><?php echo $member['name'] . ' ' . $member['surname'];?></span>
                  <span class="programm"><?php echo $member['title'];?></span>
                  <span class="group-md">№ гр. <span><?php echo $member['inGroup'];?></span>
                  <span class="period-xs"><?php echo $member['start'];?> — <?php echo $member['finish'];?></span>
                </a>
              </div>

              <div class="table-td table-group">
                <a href="/members/member-<?php echo $member['id'];?>"><?php echo $member['inGroup'];?></a>
              </div>

              <div class="table-td table-start">
                <a href="/members/member-<?php echo $member['id'];?>"><?php echo $member['start'];?></a>
              </div>

              <div class="table-td table-finish">
                <a href="/members/member-<?php echo $member['id'];?>"><?php echo $member['finish'];?></a>
              </div>
            </div>
            <?php endforeach; ?>

          </div>
        </div>

        <!-- Вызов модального окошка  #modalUser-->
        <a href="#" class="btn-modal btn-circle btn-large btn-xs-small btn-fixed waves waves-effect waves-light" data-toggle="modal" data-target="#modalUserEdit"><i class="material-icons">add</i></a>

        <!-- Модальное окно -->
        <form class="modal animation-scale-up" id="modalUserEdit" tabindex="-1" role="dialog" aria-labelledby="modalUserLabelEdit" aria-hidden="true" method="post">
          <div class="modal-dialog modal-programm">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="material-icons close" data-dismiss="modal" aria-hidden="true">close</button>
                <h4 class="modal-title" id="modalUserLabelEdit">Добавить нового участника</h4>
              </div>

              <div class="modal-body">
                <div class="row">
                  <div class="col-xs-13 col-sm-7">
                    <div class="group">
                      <input type="text" id="membName"><span class="bar"></span>
                      <label>Имя Фамилия</label>
                    </div>

                    <div class="group">
                      <input type="email" id="membEmail"><span class="bar"></span>
                      <label>E-mail</label>
                    </div>

                    <div class="group">
                      <textarea id="membComnt"></textarea><span class="bar"></span>
                      <label>Комментарий</label>
                    </div>
                  </div>

                  <div class="col-xs-13 col-sm-6">
                    <div class="group">
                      <select name="sources" id="sources" class="custom-select sources" placeholder="Программа">
                      <?php foreach (Programs::getProgramsList() as $program):?>
                        <option value="<?php echo $program['title'];?>"><?php echo $program['title'];?></option>
                       <?php endforeach;?>
                      </select>
                    </div>

                    <!-- <div class="toggle-block">
                      <span>Статус участника</span>
                      <input id="toogle" class="toggle-checkbox" type="checkbox" hidden="hidden">
                      <label for="toogle" class="switch"></label>
                      <p>Заморожен</p>
                    </div> -->


                    <!-- <p class="extend">Продлить аккаунт</p>
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
                <input type="submit" class="btn-flat waves-effect waves-grey" value="Сохранить" id="addMemb">
              </div>

            </div>
          </div>
        </form>
        <!-- end Модальное окно -->

      </div>
      <!-- end Табличка -->

    </div>
  </div>
  <!-- end Контент страницы -->
  
<?php include(BASE_DOMAIN . '/views/footer.php');?>