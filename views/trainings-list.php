<?php include(BASE_DOMAIN . '/views/header.php');?>

  <!-- Основной контент странички -->
  <div class="page page-training">
    <div class="page-content container-fluid">
      <div class="row page-info-training">

        <div class="col-xs-13">
          <ul class="breadcrumbs">
            <li class="active">План тренировок</li>
          </ul>
        </div>

        <div class="col-xs-13">
          <h1 class="page-title">План тренировок</h1>
        </div>
      </div>

      <!-- Табличка -->
      <div class="row page-training-content plan-training-content">
        <div class="table-wrapper-no-scroll">
          <div class="filter col-xs-13">
            <div class="row filter-row">
              <h3 class="col-xs-3">ФИЛЬТР</h3>
              <div class="col-xs-13 col-sm-9">
                <span>Категория тренировок</span>
                <select name="sources" id="sources-cat" class="custom-select sources" placeholder="Все">
                  <option value="В зале">В зале</option>
                  <option value="Дома">Дома</option>
                  <option value="Дома и в зале">Дома и в зале</option>
                  <option value="Все">Все</option>
                </select>
              </div>
            </div>
          </div>
          <div class="table-content table-content-training">
            <div class="table-row table-row-th">
              <div class="table-th table-number">№</div>
              <div class="table-th table-name">Название режима тренировки</div>
              <div class="table-th table-cat">Категория тренировок</div>
              <div class="table-th table-qty tooltip" title="Кол-во тренировок в неделю">Кол-во ...</div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-praxis-one.html">10</a></div>
              <div class="table-td table-name">
                <a href="single-praxis-one.html">Облегченный режим дома
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-praxis-one.html">Дома</a></div>
              <div class="table-td table-qty"><a href="single-praxis-one.html">4</a></div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-praxis-one.html">5</a></div>
              <div class="table-td table-name">
                <a href="single-praxis-one.html">Усиленный режим в зале
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-praxis-one.html">В зале</a></div>
              <div class="table-td table-qty"><a href="single-praxis-one.html">3</a></div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-praxis-one.html">4</a></div>
              <div class="table-td table-name">
                <a href="single-praxis-one.html">Стандартый режим в зале
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-praxis-one.html">В зале</a></div>
              <div class="table-td table-qty"><a href="single-praxis-one.html">5</a></div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-praxis-double.html">3</a></div>
              <div class="table-td table-name">
                <a href="single-praxis-double.html">Стандартный режим дома и в зале
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-praxis-double.html">Дома и в зале</a></div>
              <div class="table-td table-qty"><a href="single-praxis-double.html">2</a></div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-praxis-one.html">2</a></div>
              <div class="table-td table-name">
                <a href="single-praxis-one.html">Облегченный режим в зале
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-praxis-one.html">В зале</a></div>
              <div class="table-td table-qty"><a href="single-praxis-one.html">3</a></div>
            </div>

            <div class="table-row">
              <div class="table-td table-number"><a href="single-praxis-double.html">1</a></div>
              <div class="table-td table-name">
                <a href="single-praxis-double.html">Усиленный режим дома и в зале
                  <span class="table-name-desc">Отличная подборка для начала тренировок. Содержит: разминку, тренировку, растяжку</span>
                </a>
              </div>
              <div class="table-td table-cat"><a href="single-praxis-double.html">Дома и в зале</a></div>
              <div class="table-td table-qty"><a href="single-praxis-double.html">5</a></div>
            </div>

          </div>
        </div>
        <!-- end Табличка -->

        <a href="praxis-edit.html" class="btn-circle btn-large btn-xs-small btn-fixed waves waves-effect waves-light"><i class="material-icons">add</i></a>

      </div>
    </div>
  </div>
  <!-- End Основной контент странички -->

<?php include(BASE_DOMAIN . '/views/footer.php');?>