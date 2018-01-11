<?php include(BASE_DOMAIN . '/views/header.php');?>

  <!-- Основной контент странички -->
  <div class="page page-dashboard">
    <div class="container-fluid">
      <div class="row page-info-dashboard">

        <div class="col-xs-13 col-sm-6">
          <ul class="breadcrumbs">
            <li class="active">Обзор</li>
          </ul>

          <h1 class="page-title">Обзор</h1>
        </div>
      </div>

      <div class="row page-content page-content-dashboard">
        <div class="dashboard-column">
          <h3>Динамика веса</h3>
          <canvas id="chartWeight" height="300" width="500"></canvas>
        </div>

        <div class="dashboard-column">
          <h3>Динамика объема</h3>
          <canvas id="chartСapacity" height="300" width="500"></canvas>
        </div>

        <div class="dashboard-column">
          <h3>Самочувствие</h3>
          <canvas id="chartHealth" height="300" width="500"></canvas>
        </div>

        <div class="dashboard-column">
          <h3>Пульс</h3>
          <canvas id="chartPulse" height="300" width="500"></canvas>
        </div>
      </div>
    </div>
  </div>
   <!-- End Основной контент странички -->

<?php include(BASE_DOMAIN . '/views/footer.php');?>