<?php include(BASE_DOMAIN . '/views/header.php');?>

  <!-- Основной контент странички -->
  <div class="page page-training">
    <div class="page-content container-fluid">
      <div class="row page-info-training">

        <div class="col-xs-13">
          <ul class="breadcrumbs">
            <li class="active">Тренировки</li>
          </ul>
        </div>

        <div class="col-xs-13">
          <h1 class="page-title">Тренировки</h1>
        </div>
      </div>

      <!-- Табличка -->
      <div class="row page-training-content">
        <div class="table-wrapper-no-scroll">
          <div class="filter col-xs-13">
            <div class="row filter-row">
              <h3 class="col-xs-3">ФИЛЬТР</h3>
              <div class="col-xs-13 col-sm-5">
                <span>Категория тренировок</span>
                <select name="sources" id="sources-cat" class="custom-select sources" placeholder="Все">
                  <option value="В зале">В зале</option>
                  <option value="Дома">Дома</option>
                  <option value="Все">Все</option>
                </select>
              </div>

              <div class="col-xs-13 col-sm-5">
                <span>Тип тренировок</span>
                <select name="sources" id="sources-type" class="custom-select sources" placeholder="Все">
                  <option value="Силовые">Силовые</option>
                  <option value="Кардио">Кардио</option>
                  <option value="Все">Все</option>
                </select>
              </div>
            </div>
          </div>

          <div class="table-content table-content-training">
            <div class="table-row table-row-th">
              <div class="table-th table-number">№</div>
              <div class="table-th table-name">Название тренировки</div>
              <div class="table-th table-cat">Категория тренировок</div>
              <div class="table-th table-type">Тип тренировок</div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-training.html">10</a></div>
              <div class="table-td table-name">
                <a href="single-training.html">Силовая тренировка дома
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-training.html">Дома</a></div>
              <div class="table-td table-type"><a href="single-training.html">Силовые</a></div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-training.html">5</a></div>
              <div class="table-td table-name">
                <a href="single-training.html">Силовая тренировка в зале
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-training.html">В зале</a></div>
              <div class="table-td table-type"><a href="single-training.html">Силовые</a></div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-training.html">4</a></div>
              <div class="table-td table-name">
                <a href="single-training.html">Кардио тренировка в зале
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-training.html">В зале</a></div>
              <div class="table-td table-type"><a href="single-training.html">Кардио</a></div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-training.html">3</a></div>
              <div class="table-td table-name">
                <a href="single-training.html">Силовая тренировка дома
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-training.html">Дома</a></div>
              <div class="table-td table-type"><a href="single-training.html">Силовые</a></div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-training.html">2</a></div>
              <div class="table-td table-name">
                <a href="single-training.html">Силовая тренировка в зале
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-training.html">В зале</a></div>
              <div class="table-td table-type"><a href="single-training.html">Силовые</a></div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-training.html">1</a></div>
              <div class="table-td table-name">
                <a href="single-training.html">Кардио тренировка дома
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-training.html">Дома</a></div>
              <div class="table-td table-type"><a href="single-training.html">Кардио</a></div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-training.html">10</a></div>
              <div class="table-td table-name">
                <a href="single-training.html">Силовая тренировка дома
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-training.html">Дома</a></div>
              <div class="table-td table-type"><a href="single-training.html">Силовые</a></div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-training.html">5</a></div>
              <div class="table-td table-name">
                <a href="single-training.html">Силовая тренировка в зале
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-training.html">В зале</a></div>
              <div class="table-td table-type"><a href="single-training.html">Силовые</a></div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-training.html">4</a></div>
              <div class="table-td table-name">
                <a href="single-training.html">Кардио тренировка в зале
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-training.html">В зале</a></div>
              <div class="table-td table-type"><a href="single-training.html">Кардио</a></div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-training.html">3</a></div>
              <div class="table-td table-name">
                <a href="single-training.html">Силовая тренировка дома
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-training.html">Дома</a></div>
              <div class="table-td table-type"><a href="single-training.html">Силовые</a></div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-training.html">2</a></div>
              <div class="table-td table-name">
                <a href="single-training.html">Силовая тренировка в зале
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-training.html">В зале</a></div>
              <div class="table-td table-type"><a href="single-training.html">Силовые</a></div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-training.html">1</a></div>
              <div class="table-td table-name">
                <a href="single-training.html">Кардио тренировка дома
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-training.html">Дома</a></div>
              <div class="table-td table-type"><a href="single-training.html">Кардио</a></div>
            </div>

          </div>
        </div>
        <!-- end Табличка -->

        <a href="training-edit.html" class="btn-circle btn-large btn-xs-small btn-fixed waves waves-effect waves-light"><i class="material-icons">add</i></a>

      </div>
    </div>
  </div>
  <!-- End Основной контент странички -->

<?php include(BASE_DOMAIN . '/views/footer.php');?>