<?php include(BASE_DOMAIN . '/views/header.php');?>

  <!-- Основной контент странички -->
  <div class="page single-page-rules">
    <div class="page-content container-fluid">
      <div class="row page-info-rules">

        <div class="col-xs-13">
          <ul class="breadcrumbs">
            <li class="active">Как питаться</li>
          </ul>
        </div>

        <div class="col-xs-13">
          <h1 class="page-title">Как питаться</h1>
        </div>
      </div>

      <div class="row page-text-content">
        <div class="col-xs-13">
          <a href="how-to-eat/1" class="btn-default waves waves-effect waves-light right-position">Изменить</a>
        </div>

        <div class="col-xs-13">

          <?php echo($nutrilon) ?>

        </div>

      </div>
    </div>
  </div>
  <!-- End Основной контент странички -->

<?php include(BASE_DOMAIN . '/views/footer.php');?>