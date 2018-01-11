<?php include(BASE_DOMAIN . '/views/header.php');?>

  <!-- Основной контент странички -->
  <div class="page page-sport-food">
    <div class="page-content container-fluid">
      <div class="row page-info-sport-food">

        <div class="col-xs-13">
          <ul class="breadcrumbs">
            <li class="active">Спортивное питание</li>
          </ul>
        </div>

        <div class="col-xs-13">
          <h1 class="page-title">Спортивное питание</h1>
        </div>
      </div>

      <div class="row page-text-content">
        <div class="col-xs-13">
          <a href="sport-food/1" class="btn-default waves waves-effect waves-light right-position">Изменить</a>
        </div>

        <div class="col-xs-13">
          <div class="accordion-wrapper">

            <?php echo($nutrilonSport) ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Основной контент странички -->

<?php include(BASE_DOMAIN . '/views/footer.php');?>