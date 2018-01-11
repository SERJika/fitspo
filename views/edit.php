<?php include(BASE_DOMAIN . '/views/header.min.php');?>

<!-- Контент страницы -->
  <div class="" style="width: 100%; height: 100%;">
    <div class="" style="width: 98%; height: 200px; margin: 5% auto">
      
      <form name="" id="regTabl" method="post" style="display: inline-block;">
        
              <div class="table-td" style="padding-left: 20px; text-align: left; vertical-align: top;">
                <p id="msgAuth"></p>
              </div>

              <div class="table-td" style="padding-left: 20%; text-align: left; vertical-align: top;">
                <label><span style="display: inline-block; width: 150px;">Емейл </span>
                  <input type="text" id="email" name="email" />
                </label>
              </div>
              
              <div class="table-td" style="padding-left: 20%; text-align: left; vertical-align: top;">
                <label><span style="display: inline-block; width: 150px;">Пароль </span>
                  <input type="password" id="pass" name="pass" />
                </label>
              </div>
            
              <!-- <div id="editAc_1" class="table-td" style="padding-left: 20%; text-align: left; vertical-align: top; display: none;">
                <label><span style="display: inline-block; width: 150px;">Повторите пароль </span>
                  <input type="password" id="pass2" name="pass2" />
                </label>
              </div> -->

              <div class="table-td" style="padding-left: 20%; text-align: left; vertical-align: top;">
                  <span style="display: inline-block; width: 150px; padding-top: 30px;"> </span>
                  
                <!-- <div id="editAc_2" style="display: none;">
                  <input type="submit" id="regist" value="Зарегистрироваться" />
                  <a href="javascript:void(0);" style="text-decoration: underline; display: block; margin-top: 15px;" id="goEdit">Войти в личный кабинет</a>
                </div> -->
                <div id="editAc_3">  
                  <input type="submit" id="entrance" value="Войти в кабинет" />
                  <!-- <a href="javascript:void(0);" style="text-decoration: underline; display: block; margin-top: 15px;" id="goReg">Зарегистрироваться</a> -->
                </div>

      </form>

    </div>
  </div>   
<!-- Конец контента страницы -->

<?php include(BASE_DOMAIN . '/views/footer.min.php');?>