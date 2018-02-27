<?php include(BASE_DOMAIN . '/views/header.php');?>

<!-- Контент страницы -->
  <div class="page page-user">
    <div class="page-content container-fluid">
      <div class="row page-info">

        <div class="col-xs-13">
          <ul class="breadcrumbs">
            <li class="active">Статистика</li>
          </ul>
        </div>

        <div class="col-xs-13">
          <h1 class="page-title">Статистика</h1>
        </div>
      </div>

      <!-- Табличка -->
      <div class="row page-user-content" id="dasboardTabl">
        <div class="table-wrapper" data-mcs-theme="dark-3">
          <div class="table-content table-users">
            <div class="table-row">
        
              <div class="table-td" style="padding-left: 30px; text-align: left; vertical-align: top;">
                <section class="statistics">
                  <a class="statistics-link" href="/groups"><h2 class="bl-title"><span>Группы</span></h2></a>
                  <p class="c">Всего групп = <?php echo $groups;?></p>
                </section>
              </div>
              <div class="table-td" style="padding-left: 30px; text-align: left; vertical-align: top;">
                <section class="statistics">
                  <h2 class="bl-title">Отчеты</h2>
                  <p class="c">Отчетов на проверку = { в разработке } <?php //echo $newReports;?></p>
                  <p class="c">Должников по отчетам = { в разработке } <?php //echo $noReports;?></p>
                </section>
              </div>
            </div>
            <div class="table-row">  
              <div class="table-td" style="padding-left: 30px; text-align: left; vertical-align: top;">
                <section class="statistics">
                  <a class="statistics-link" href="/members"><h2 class="bl-title"><span>Участники</span></h2></a>
                  <p class="c">Всего участников = <?php echo $members;?></p>
                </section>
              </div>
              <div class="table-td" style="padding-left: 30px; text-align: left; vertical-align: top;">
                <section class="statistics">
                  <h2 class="bl-title">Анкеты</h2>
                  <p class="c">Новых анкет = { в разработке } <?php //echo $newQuestionnaries;?></p>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Конец контента страницы -->

<?php include(BASE_DOMAIN . '/views/footer.php');?>