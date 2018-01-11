<?php include(BASE_DOMAIN . '/views/header.php');?>


  <!-- Основной контент странички -->
  <div class="page page-programms">
    <div class="page-content container-fluid">
      <div class="row page-info-programms">

        <div class="col-xs-13">
          <ul class="breadcrumbs">
            <li class="active">Программы</li>
          </ul>
        </div>  

        <div class="col-xs-13">
          <h1 class="page-title">Программы</h1>
        </div>
      </div>
      <!-- Табличка -->
      <div class="row page-programms-content">
        <div class="table-wrapper" data-mcs-theme="dark-3">
          <div class="table-content table-content-programms">
            <div class="table-row table-row-th">
              <div class="table-th table-name-programm">Программа</div>
              <div class="table-th table-type-programm">Тип программы</div>
              <div class="table-th table-duration tooltip" title="Длительность программы (дни)">Длит...</div>
              <div class="table-th table-report-period tooltip" title="Отчетный период (дни)">Отчет...</div>
              <div class="table-th"></div>
            </div>

            <?php foreach ($programs as $program): ?>
            <div class="table-row">
              <div class="table-td table-name-programm">
                <span><?php echo $program['title'];?></span>
                <span class="table-name-desc"><?php echo $program['description'];?></span>
              </div>
              <div class="table-td table-type-programm"><?php echo Programs::showProgramType($program['type']);?></div>
              <div class="table-td table-duration"><?php echo $program['duration'];?></div>
              <div class="table-td table-report-period"><?php echo $program['reports'];?></div>
              <div class="table-td table-remove">
                <button class="del-progr-btn" id="delProgram_<?php echo $program['id'];?>" data-id="<?php echo $program['id'];?>" data-value="Программа &laquo;<?php echo $program['title'];?>&raquo;"><i class="material-icons">delete</i></button>
              </div>
            </div>
            <?php endforeach; ?>

          </div>
        </div>
        <!-- end Табличка -->

       <!-- Вызов модального окошка  #modalUser-->
        <a href="#" class="btn-modal btn-circle btn-large btn-xs-small btn-fixed waves waves-effect waves-light" data-toggle="modal" data-target="#modalUser"><i class="material-icons">add</i></a>

        <!-- Модальное окно -->
        <form class="modal animation-scale-up" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="modalUserLabel" aria-hidden="true">
          <div class="modal-dialog modal-programm">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="material-icons close" data-dismiss="modal" aria-hidden="true">close</button>
                <h3 class="modal-title" id="modalUserLabel">Создать новую программу</h3>
              </div>

              <div class="modal-body">
                <div class="row row-programm">
                  <div class="col-xs-13 col-sm-7">
                    <div class="group group-desc">
                      <input type="text" id="progTitle" value="<?php Programs::ifIssetValue('title');?>"><span class="bar"></span>
                      <label>Программа</label>
                    </div>

                     <div class="group group-desc">
                      <input type="text" id="progDescription" value="<?php Programs::ifIssetValue('description');?>"><span class="bar"></span>
                      <label>Описание</label>
                    </div>
                  </div>

                  <div class="col-xs-13 col-sm-6">
                    <div class="row">
                      <div class="col-xs-13 col-sm-12">
                        <div class="group">
                          <select name="sources" id="progType" class="custom-select sources" placeholder="Тип программы">
                            <option value="1">Тренировки и питание</option>
                            <option value="2">Только тренировки</option>
                            <option value="3">Только питание</option>
                          </select>
                        </div>
                      </div>

                      <div class="group group-day col-xs-6">
                        <input type="text" id="progDuration" value="<?php Common::showIfIssetSessionValue('programs', 'duration');?>"><span class="bar"></span>
                        <label>Длит...(дни)</label>
                      </div>

                      <div class="group group-day col-xs-6 col-xs-offset-1 col-sm-offset-0">
                        <input type="text" id="progReports" value="<?php Common::showIfIssetSessionValue('programs', 'reports');?>"><span class="bar"></span>
                        <label>Отчет...(дни)</label>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <a href="#" class="btn-flat waves-effect waves-grey close" data-dismiss="modal" aria-hidden="true">Отмена</a>
                <input type="submit" class="btn-flat waves-effect waves-grey" id="addProgram" value="Сохранить">
              </div>

            </div>
          </div>
        </form>
        <!-- end Модальное окно -->
      </div>
    </div>
  </div>
  <!-- End Основной контент странички -->


<?php include(BASE_DOMAIN . '/views/footer.php');?>