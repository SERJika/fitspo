<?php include(BASE_DOMAIN . '/views/header.php');?>


  <!-- Основной контент странички -->
  <div class="page page-food">
    <div class="page-content container-fluid">
      <div class="row page-info-food">

        <div class="col-xs-13">
          <ul class="breadcrumbs">
            <li class="active">Питание</li>
          </ul>
        </div>

        <div class="col-xs-13">
          <h1 class="page-title">Питание</h1>
        </div>
      </div>

      <div class="row page-group-content">
        <div class="table-wrapper" data-mcs-theme="dark-3">
          <div class="table-content table-content-food">

            <div class="table-row">
              <div class="table-th table-name-programm">Режим питания</div>
            </div>

            <div class="table-row">
              <div class="table-td table-name-programm">
                <a href="single-food.html">
                  Строгий режим
                  <span class="desc">Низкоуглеводная диета для быстрого эффекта похудения</span>
                </a>
              </div>
            </div>

            <div class="table-row">
              <div class="table-td table-name-programm">
                <a href="single-food.html">
                  Щадящий режим
                  <span class="desc">Питание по соматипу для начинающих</span>
                </a>
              </div>
            </div>

          </div>
        </div>

        <a href="#" class="btn-circle btn-large btn-xs-small btn-fixed waves waves-effect waves-light"><i class="material-icons">add</i></a>
      </div>
    </div>
  </div>
  <!-- End Основной контент странички -->


<?php include(BASE_DOMAIN . '/views/footer.php');?>