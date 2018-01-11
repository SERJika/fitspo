  <!-- Основной контент странички -->
  <div class="page page-calendar">
    <div class="page-content container-fluid">
      <div class="row page-info-calendar">

        <div class="col-xs-13">
          <ul class="breadcrumbs">
            <li class="active">Календарь</li>
          </ul>
        </div>

        <div class="col-xs-13">
          <h1 class="page-title">Календарь</h1>
        </div>
      </div>

      <div class="row page-text-content">
        <form class="col-xs-13">
          <div class="calendar-rules">
            <span class="question btn-modal" data-toggle="modal" data-target="#modalCalendar"><i class="material-icons">help</i></span>
            <span>Тренировки:</span>

            <div class="rkmd-radio radio-ripple input-ripple">
              Дома
              <label class="input-radio input-checkbox-radio radio-aquamarine">
                <input type="radio" name="radio-training" checked>
                <span class="radio"></span>
              </label>
            </div>

            <div class="rkmd-radio radio-ripple input-ripple">
              В зале
              <label class="input-radio input-checkbox-radio radio-aquamarine">
                <input type="radio" name="radio-training">
                <span class="radio"></span>
              </label>
            </div>
          </div>

          <a href="lk-user-calendar-edit.html" class="btn-calendar-edit btn-default waves waves-effect waves-light right-position">Изменить</a>

          <div id="calendar"></div>
        </form>
      </div>
    </div>
  </div>
   <!-- End Основной контент странички -->