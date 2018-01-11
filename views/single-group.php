<?php include(BASE_DOMAIN . '/views/header.php');?>



  <!-- Контент страницы -->
  <div class="page page-single-group">
    <div class="page-content container-fluid">
      <div class="row page-info page-info-group">

        <div class="col-xs-13">
          <ul class="breadcrumbs">
            <li><a href="/groups">Группы</a></li>
            <li class="active">Группа <?php echo $group['numb'];?></li>
          </ul>
        </div>

        <div class="col-xs-13">
          <h1 class="page-title">Группа <?php echo $group['numb'];?></h1>
        </div>
      </div>

      <!-- Табличка -->
      <div class="row page-group-content">
        <div class="table-wrapper" data-mcs-theme="dark-3" id="tablOfMembs">
          <div class="table-content table-content-user">
            <div class="table-row">
              <div class="table-th"></div>
              <div class="table-th table-user">Участники</div>
              <div class="table-th"></div>
            </div>
            
            <?php foreach ($members_in_group as $memberIn): ?>
            <div class="table-row">
              <div class="table-td table-image">
                <a href="/members/member-<?php echo $memberIn['id'];?>" class="user-img circle">
                  <?php echo Members::getAvatar($memberIn);?>
                </a>
              </div>

              <div class="table-td table-name">
                <a href="/members/member-<?php echo $memberIn['id'];?>">
                  <span><?php echo $memberIn['name'];?> <?php echo $memberIn['surname'];?></span>
                </a>
              </div>

              <div class="table-td table-button">
                <a href="/members/reports/<?php echo $memberIn['id'];?>" class="btn-flat btn-flat-blue waves-effect waves-grey">ОТЧЕТ</a>
              </div>
            </div>
            <?php endforeach; ?>

<!--             <div class="table-row">
              <div class="table-td table-image">
                <a href="single-user-edit.html" class="user-img circle">
                  <i class="material-icons user-icon">face</i>
                </a>
              </div>

              <div class="table-td table-name">
                <a href="single-user-edit.html"><span>Светлана Иванова</span> <span class="label label-new">НОВЫЙ</span></a>
              </div>

              <div class="table-td table-button">
                <a href="single-user-report.html" class="btn-flat disabled waves-effect waves-button">ОТЧЕТ</a>
              </div>
            </div> -->

          </div>
        </div>

        <!-- Вызов модального окошка  #modalUser-->
        <a href="#" class="btn-modal btn-circle btn-large btn-xs-small btn-fixed waves waves-effect waves-light" data-toggle="modal" data-target="#modalUser"><i class="material-icons">add</i></a>

        <!-- Модальное окно -->
        <form class="modal animation-scale-up" method="post" name="chooseMembToAdd" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="modalUserLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="material-icons close" data-dismiss="modal" aria-hidden="true">close</button>
                <h3 class="modal-title" id="modalUserLabel">Добавить участника</h3>
              </div>

              <div class="modal-body">
                <?php foreach ($members_out_of_group as $memberOut): ?>
                <div class="row row-user">
                  <div class="col-xs-3 col-sm-2 col-md-2 user-img-column">
                    <div class="user-img circle">
                      <?php echo Members::getAvatar($memberOut);?>
                    </div>
                  </div>
                  <div class="col-xs-7 col-sm-8 col-md-9 user-name-column">
                    <!-- <input type="hidden" id="member_id" name="member-id" value="<?php echo $memberOut['id'];?>" /> -->
                    <p class="name-user"><?php echo $memberOut['name'];?> <?php echo $memberOut['surname'];?></p>
                    <span class="name-programm"><?php echo $memberOut['title'];?></span>
                  </div>
                  <div class="col-xs-3 col-sm-2 col-md-2 user-checkbox-column">
                    <div class="rkmd-checkbox checkbox-ripple input-ripple">
                      <label class="input-checkbox input-checkbox-radio checkbox-aquamarine">
                        <input type="checkbox" class="chooseMember" value="<?php echo $memberOut['id'];?>">
                        <span class="checkbox"></span>
                      </label>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>

              <div class="modal-footer">
                <input type="submit" class="btn-flat waves-effect waves-grey" id="addMembers" value="ПОДТВЕРДИТЬ">
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

  <!-- Сайдбар -->
  <aside class="page-aside page-aside-right page-aside-fixed">
    <div class="page-aside-switch">
      <i class="material-icons">settings</i>
    </div>

    <header class="aside-header">
      <div class="page-aside-switch-inner"></div>
      <div class="button">
        <!-- Если в группе участников нет, то ее можно удалить. У ссылки убрать класс  disabled-->
        <a href="#" class="btn-flat waves-effect waves-grey" 
        id="del_group" data-id="<?php echo $group['numb'];?>" 
        onclick="return false;">Удалить</a>
        <a href="#" class="btn-flat waves-effect waves-grey hidden" 
        id="save_change_group" data-id="<?php echo $group['numb'];?>" 
        onclick="return false;">Сохранить</a>
        <a href="#" class="btn-flat waves-effect waves-grey" 
        id="change_group" data-id="<?php echo $group['numb'];?>" 
        onclick="return false;">Изменить</a>
      </div>
    </header>

    <div class="aside-content">
      <h2>Группа <span id="groupNumb"><?php echo $group['numb'];?></span></h2>
      <div class="group" id="programBl">
        
        <p id="showProgramTitle"><?php echo $group['title'];?></p>

        <p id="editProgramTitle">
        <select name="sources" class="custom-select sources" placeholder="Выбери программу" id="titleSelected">
        <?php foreach (Programs::getProgramsList() as $program):?>
          <option value="<?php echo $program['title'];?>"><?php echo $program['title'];?></option>
        <?php endforeach;?>
        </select>
        </p>
      </div>
      
      <ul class="aside-info-block">
        <li>
          <div class="form-group" id="startBl">
            <!-- <span class="start-datepicker">Старт группы</span> -->
            <span class="sub-text">Старт группы</span>

            <div class="input-date-control hidden" id="updateStart">
              <input class="datepicker form-control" type="text" id="startSelected" value="" />
              <!-- <?php //echo $group['start'];?> -->
              <span class="caret"></span>
            </div>
            
            <span class="main-text" id="showStart"><?php echo $group['start'];?></span>

          </div>
        </li>
        <li>
          <div class="form-group">
            
            <span class="sub-text">Финиш группы</span>
            <span class="main-text"><?php echo $group['finish'];?></span>

          </div>
        </li>
        <li>
          <span class="sub-text">Участников</span>
          <span class="main-text" id="countMembers"><?php echo count($members_in_group);?></span>
        </li>
      </ul>

    </div>
  </aside>
  <!-- end Сайдбар -->


<?php include(BASE_DOMAIN . '/views/footer.php');?>