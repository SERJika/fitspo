<?php include(BASE_DOMAIN . '/views/header.php');?>

  <!-- Основной контент странички -->
  <div class="page page-training">
    <div class="page-content container-fluid">
      <div class="row page-info-training">

        <div class="col-xs-13">
          <ul class="breadcrumbs">
            <li><a href="training.html">Тренировки</a></li>
            <li class="active">Силовая тренировка дома</li>
          </ul>
        </div>

        <div class="col-xs-13">
          <h1 class="page-title">Силовая тренировка дома</h1>
        </div>
      </div>

      <!-- Слайдер -->
      <div class="row single-training-content">
        <div class="col-xs-13">
          <a href="single-training-edit.html" class="btn-default waves waves-effect waves-light right-position">Изменить</a>
        </div>

        <div class="training-item col-xs-13">
          <div class="training-slide">
            <div class="slide-media">
              <img src="img/training-slider.jpg" alt="ПРИСЕД В СМИТЕ ИЛИ С ГАНТЕЛЯМИ">
            </div>
            <div class="slide-desc col-xs-13 col-sm-8">
              <h3>ПРИСЕД В СМИТЕ ИЛИ С ГАНТЕЛЯМИ</h3>
              <p>Число подходов 2 -3 по 15-20 раз. И так несколько раз, пока не упадете. Не лежим, встаем и снова приседаем :)</p>
            </div>
          </div>

          <div class="training-slide">
            <div class="slide-media">
              <iframe src="https://www.youtube.com/embed/kmJMxy46FHQ" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="slide-desc col-xs-13 col-sm-8">
              <h3>ПРИСЕД В СМИТЕ ИЛИ С ГАНТЕЛЯМИ</h3>
              <p>Число подходов 2 -3 по 15-20 раз. И так несколько раз, пока не упадете. Не лежим, встаем и снова приседаем :)</p>
            </div>
          </div>
        </div>
        <!-- счетчик слайдов -->
        <span class="pagingInfo"></span>
      </div>
      <!-- end Слайдер -->
    </div>
  </div>
  <!-- End Основной контент странички -->

<?php include(BASE_DOMAIN . '/views/footer.php');?>