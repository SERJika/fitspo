	<!--[if lt IE 9]>
	<script src="<?php echo THE_DOMAIN?>template/libs/html5shiv/es5-shim.min.js"></script>
	<script src="<?php echo THE_DOMAIN?>template/libs/html5shiv/html5shiv.min.js"></script>
	<script src="<?php echo THE_DOMAIN?>template/libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="<?php echo THE_DOMAIN?>template/libs/respond/respond.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/polyfill/eventListener.polyfill.min.js"></script>
	<![endif]-->

	<script src="<?php echo THE_DOMAIN?>template/libs/jquery/jquery.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/bootstrap/js/bootstrap.min.js"></script>

<?php //if ($page == 'groupCard' || $page == 'groupNew' || $page == 'membersList'):?>
  <!-- <script src="<?php //echo THE_DOMAIN?>template/libs/bootstrap/js/bootstrap-datepicker.js"></script> -->
<?php //endif ?>


  <script src="<?php echo THE_DOMAIN?>template/libs/bootstrap/js/bootstrap-datepicker.js"></script>

  <script src="<?php echo THE_DOMAIN?>template/libs/asscrollable/jquery.asScrollable.all.min.js"></script>

  <script src="<?php echo THE_DOMAIN?>template/libs/animsition/animsition.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/asscroll/jquery-asScroll.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/mmenu/dist/js/jquery.mmenu.min.all.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/menu-side/core.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/menu-side/site.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/menu-side/menubar.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/menu-side/asscrollable.min.js"></script>

<!-- Эффекты Material design -->
  <script src="<?php echo THE_DOMAIN?>template/libs/Waves-0.7.5/dist/waves.min.js"></script>

<?php if ($page == 'trainCard'): ?>
<!-- Responsive slider -->
<!--   <script src="<?php echo THE_DOMAIN?>template/libs/slick/slick.min.js"></script> -->
<?php endif ?>


  <script src="<?php echo THE_DOMAIN?>template/libs/slick/slick.min.js"></script>

  <script src="<?php echo THE_DOMAIN?>template/js/form.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/js/jquery.autosize.js"></script>
  <!-- <script src="<?php echo THE_DOMAIN?>template/js/image.js"></script> -->

<?php if ($page == 'profileCard'): ?>
<!-- Responsive textarea -->
  <!-- <script src="<?php echo THE_DOMAIN?>template/js/jquery.autosize.js"></script> -->

  <script src="<?php echo THE_DOMAIN?>template/libs/fine-uploader/jquery.fine-uploader.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/calendario/moment.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/calendario/fullcalendar.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/calendario/ru.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/js/common-user.js"></script>
<?php else: ?>
    <script src="<?php echo THE_DOMAIN?>template/libs/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/js/common.js"></script>

<?php endif ?>






<script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;

      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>


<?php if ($page == 'profileCard'): ?>
<script>

  // ========= АНКЕТА =============
  // Загрузка фотографий

  // $('#fine-uploader-gallery').fineUploader({
  //   template: 'qq-template-gallery',
  //   request: {
  //       endpoint: '/handlers/endpoint.php'
  //   },
  //   validation: {
  //       allowedExtensions: ['jpeg', 'jpg', 'gif', 'png']
  //   }
  // });

// Проверка предустановленных значений радиокнопок в анкете
        $(document).ready(function () {

          checkSelectedValInProfile(2, "measure", "<?php echo $member['measure'] ?>");
          // checkSelectedValInProfile(7, "perWeek", "<?php echo $member['perWeek'] ?>", "select");
          checkSelectedValInProfile(3, "exPlace", "<?php echo $member['trainMode'] ?>");
          checkSelectedValInProfile(5, "activity", "<?php echo $member['A1'] ?>");
          checkSelectedValInProfile(3, "nutrilon", "<?php echo $member['F1'] ?>");
          checkSelectedValInProfile(3, "nutriType", "<?php echo $member['F2'] ?>");
          checkSelectedValInProfile(2, "exTime", "<?php echo $member['W1'] ?>");

          function checkSelectedValInProfile(iVal, id, val, inpType)
          {
            // return;
            inpType = inpType || 'radio';
            var x;
                // y = val;
            for (var i = 1; i <= iVal; i++) {
              x = $('#' + id + '_' + i);

              if (inpType == 'radio') {
                if (x.val() == val) {
                  x.prop("checked", true);
                }
              }
              if (inpType == 'select') {
                // alert('option.text = ' + x.text() + "\roption.val = " + $('#'+ id).val() + "\rPHPval = " + val);
                if (x.text() == val) {
                  $('#'+ id).val(val);
                }
              }
            }
          }
        });



  $("#questionnareSubmit").on('click', function() {
    $('#questionnareForm').submit();
  });


// ==============================================================
</script>
<?php endif; ?>


<!-- Начало - скрипты программ -->
<script>
  "use strict"

  $(document).ready(function () {

// ================ MEMBERS ==================

$("span.custom-select-trigger").text( $("#sources").val() );

<?php if ($page == "membersList"): ?>

    // --- ДОБАВИТЬ участника AJAX --------
      $(document).on('click','#addMemb', function(e) {
        // e.preventDefault();
        var params = {
          name     : $('#membName').val(),
          email    : $('#membEmail').val(),
          comment  : $('#membComnt').val(),
          program  : $('#sources').val(),
        }
  //alert (params.name + ' ' + params.email + ' ' + params.comment + ' ' + params.program);

        var url = '/members/createMember';

        $.post(url, params, function(edata) {
if (edata == "110") {
    alert('Участник с такой почтой уже существует!');
}
    //confirm('i do');
            location.href = location.href; //Перезагрузка страницы
          });
  //alert(e);
      });
    // ---------------------------------------
<?php endif ?>


<?php if ($page == "memberCard"): ?>
    // --- Отправка НОВАЯ АНКЕТА -----------
        $(document).on('click','#sendQuestionnaire', function(e) {
          var userAnsw = confirm("Вы уверены, что хотите послать новую анкету?");
          if (!userAnsw) return;
          var params = {
            name  : "<?php echo $member['name'] ?>",
            email : "<?php echo $member['email'] ?>",
          }
          var url = "/sendQuestionnaire/<?php echo $member['id'] ?>";
// alert ('ready to send');
          $.post(url, params, function(data){
            //alert(data);
            alert('Анкета успешно отправлена!');
          });
        });
    // ---------------------------------------

    // --- ИЗМЕНИТЬ карточку участника -----

      $("#changeMember").click(function(){
        var id = $(this).attr("data-value");

        var nameStr = $("#membName").val();
        var nameArr = nameStr.split(" ");

        var params = {
          name: nameArr[0],
          surname:  nameArr[1],
          email: $("#membEmail").val(),
          comment: $("#membComment").val(),
          program: $("#sources").val(),
        };
        var url = '/members/changeMember/' + id;

        $.post(url, params, function(data){
            // alert(data);
          });
        location.href = "/members/member-" + id;
      });
    // ---------------------------------------

    // --- УДАЛИТЬ карточку участника -----
      $("#delMemb").click(function(){
        var id = $(this).attr("data-value");

        if (!confirm('Вы действительно хотите удалить этого участника?')) return false;

        var url = '/members/delMember/' + id;

        $.post(url, function(data){
            // alert(data);
          });
        location.href = "/members";
      });
    // ---------------------------------------
<?php endif ?>
// ==============================================


      $("#addProgram").click(function(){
        var elem = $(this).attr("data-value");
        var params = {
          title: $("#progTitle").val(),
          description:  $("#progDescription").val(),
          type: $("#progType").val(),
          duration: $("#progDuration").val(),
          reports: $("#progReports").val(),
        };

        $.post('/programs/addProgramAjax', params, function (data) {
          $('#errMsg').text(data);
          // alert('ku');
          if (data) alert(data);
        });
      });

      $(".del-progr-btn").click(function(){

        var elem = $(this).attr("data-value");
        if (!confirmDel(elem)) return false;

        var id = $(this).attr("data-id");
        $.post('/programs/delProgramAjax/' + id, '', function (data) {});
        location.href = location.href; //Перезагрузка страницы
      });

  function confirmDel(elem)
  {
    var userResponse = confirm('Вы действительно хотите удалить\n\r ' + elem + '?');
    return userResponse;
  }
});

</script>
<!-- Конец - скрипты программ -->



<!-- Начало скрипты группы  -->
<!-- AJAX request -->
  <script type="text/javascript">
  "use strict"

//
/*
   ###   #####     ##    #    #  #####    ####
  #   #  #    #   #  #   #    #  #    #  #    #
 #       #    #  #    #  #    #  #    #  #
 #  ###  #####   #    #  #    #  #####    ####
 #    #  #  #    #    #  #    #  #            #
  #   #  #   #    #  #   #    #  #       #    #
   ####  #    #    ##     ####   #        ####
*/



<?php if ($page == "groupCard"): ?>
    // --- Add members to group -----
      $("#addMembers").click(function () {
        var addMemb = $('input:checkbox.chooseMember:checked');
        var params = {};
        for (var i = 0; i < addMemb.length; i++) {
          params[i] = addMemb[i].value;
        }
        var groupNumb = $('#groupNumb').text();
        var url = '/members/addToGroup/' + groupNumb;

        $.post(url, params, function (data) {
          location.reload();
        });
        addMemb = null;
        params = null;
        groupNumb = null;
      });


    // ----- Delete the group --------
      $("#del_group").on('click', function(e) {
        var amount = $("#countMembers").text();
        if (amount == 0) {
          var numb = $(this).attr("data-id");
          var url = '/groups/delGroup-' + numb;
          $.post(url, function (data) {
            location.reload();
          });
        } else {
          alert('Удаление группы взможно только при отсутствии участников в группе');
        }
      });

// ------------- Change the group --------------
    $(document).ready(function () {

      var updateProgram = prepareDynamicBl('#editProgramTitle'),
          updateStartInput = prepareDynamicBl('#updateStart');

      $("#change_group").click(updateGroup);

      $("#save_change_group").click(function () {
        var id      = $(this).attr("data-id"),
          numb    = $("#groupNumb").text(),
          program = $("#titleSelected").val(),
          start   = $("#startSelected").val(),
          url     = '/groups/updateGroup/' + id;

        if (start == '') {
          alert('Дата старта группы не задана: создание группы прервано!');
          return;
        }

        var params = {
          numb    : numb,
          program : program,
          start   : start,
          status  : 'oldgr'
        }

        staticGroupView();

        $.post(url, params, function (data) {
          location.reload();
        });

        $("#titleSelected").val(null);
        $("#startSelected").val(null);

        return false;
      });

      // Режим редактирования группы
      function prepareDynamicBl(id)
      {
        $(id).removeClass("hidden");
        var cutBl = $(id).detach();
        return cutBl;
      }

      function updateGroup()
      {
        $("#save_change_group").removeClass("hidden");
        $("#change_group").addClass("hidden");
        $("#showProgramTitle").addClass("hidden");
        $("#showStart").addClass("hidden");
        updateProgram.appendTo('#programBl');
        updateStartInput.appendTo('#startBl');
      }

      function staticGroupView()
      {
        $("#change_group").removeClass("hidden");
        $("#save_change_group").addClass("hidden");
        updateProgram = $('#editProgramTitle').detach();
        updateStartInput = $('#updateStart').detach();
        $("#showProgramTitle").removeClass("hidden");
        $("#showStart").removeClass("hidden");
      }

    });


    // ----------------------------------------------------
<?php endif ?>

/*
#    #  ######  #    #            ###   #####     ##    #    #  #####
##   #  #       #    #           #   #  #    #   #  #   #    #  #    #
# #  #  #       #    #          #       #    #  #    #  #    #  #    #
#  # #  ####    #    #          #  ###  #####   #    #  #    #  #####
#   ##  #       # ## #          #    #  #  #    #    #  #    #  #
#    #  #       ##  ##           #   #  #   #    #  #   #    #  #
#    #  ######  #    #  ######    ####  #    #    ##     ####   #
*/
<?php if ($page == "groupNew"): ?>
    $(document).ready(function () {
      $("#del_group").addClass("disabled");
      $("#save_change_group").removeClass("hidden");
      $("#change_group").addClass("hidden");
      $("#showProgramTitle").addClass("hidden");
      $("#showStart").addClass("hidden");
      $('#editProgramTitle').removeClass("hidden");
      $('#updateStart').removeClass("hidden");
    });

    $("#save_change_group").click(function () {
      var id      = $(this).attr("data-id"),
          numb    = $("#groupNumb").text(),
          program = $("#titleSelected").val(),
          start   = $("#startSelected").val(),
          url     = '/groups/updateGroup/' + id,
          url_new = '/groups/group-' + numb;

      if (start == '') {
        alert('Дата старта группы не задана: создание группы прервано!');
        return;
      }

      var params = {
        numb    : numb,
        program : program,
        start   : start,
        status  : 'newgr'
      }

      $.post(url, params, function (data) {
        $(location).attr('href', url_new);
      });
    });

<?php endif ?>

</script>
      <!-- Конец - скрипты группы -->


<!-- E N T R A N C E   A N D   R E G I S T R A T I O N -->
      <script type="text/javascript">
        "use strict"

// <div class="table-row" id="editAc_1">
//               <div class="table-td" style="padding-left: 20%; text-align: left; vertical-align: top;">
//                 <label><span style="display: inline-block; width: 150px;">Повторите пароль </span>
//                   <input type="password" id="pass2" />
//                 </label>
//               </div>
//             </div>

//             <div class="table-row">
//               <div class="table-td" style="padding-left: 20%; text-align: left; vertical-align: top;">
//                   <span style="display: inline-block; width: 150px; padding-top: 30px;"> </span>
                  
//                 <div id="editAc_2">
//                   <input type="submit" id="regist" value="Зарегистрироваться" />
//                   <a href="javascript:void(0);" style="text-decoration: underline;">Войти в личный кабинет</a>
//                 </div>
//                 <div id="editAc_3">  
//                   <input type="submit" id="entrance" value="Войти в кабинет" />
//                   <a href="javascript:void(0);" style="text-decoration: underline;" id="goReg">Если у тебя еще нет личного кабинета, то зарегистрируйся по ссылке</a>
//                 </div>
      $(document).on('click','#goReg', function(e) {
        //e.preventDefault();
        // alert('Click!');
        $('#editAc_1').show();
        $('#editAc_2').show();
        $('#editAc_3').hide();
        $('#msgAuth').text('');
      });
      
      $(document).on('click','#goEdit', function(e) {
        //e.preventDefault();
        // alert('Click!');
        $('#editAc_1').hide();
        $('#editAc_2').hide();
        $('#editAc_3').show();
        $('#msgAuth').text('');
      });



        // $('#entrance').click(function (e) {
        $(document).on('click','#entrance', function(e) {
        // alert('begin-1');
          e.preventDefault();
          $('#msgAuth').text('');
          var params = {
            email : $('#email').val(),
            pass  : $('#pass').val(),
          }
        // alert(params.email + ' ' + params.pass);
          $.post('/login', params, function(msg) {
            e.preventDefault();
            // alert('1)lll')
        // alert('begin-4');
            // alert('we get - \r\n' + msg);
          // $('#msgAuth').append(msg);
          var err;
          if (msg == 1) {
            err = 'Введен некорректный логин и/или пароль';
            $('#msgAuth').text(err).css('color', 'red');
          } else {
            err = 'Авторизация пройдена успешно!';
            $('#msgAuth').text(err).css('color', 'green');
            document.location.href = '/';
          }
          // alert(msg);
          
            // alert('2)lll')
            // setTimeout(function(){
            //   $("#regTabl").fadeOut(2000, redir);
            // },1000);

            // function redir() {
            //   document.location.href = '/';
            // }
            // if (msg) {
            //   document.location.href = '/';
            // }
            // document.location.href = '/';
          });
        });

// $("form#foo").get(0).allowDefault = true;


      $(document).on('click','#regist', function(e) {
        // alert('NO!!!');
          e.preventDefault();
          var params = {
            email : $('#login').val(),
            pass  : $('#pass').val(),
            pass2 : $('#pass2').val(),
          }
        
        // alert('yes!!!');

        if ( params.pass != '' && params.pass === params.pass2 ) {

          // alert('yes');

          $.post("regist", params, function(e) {
            $('#msgAuth').append(e);

              // setTimeout(function(){
              //     $("#regTabl").fadeOut(2000, redir);
              // },1000);

              // function redir() {
              //   document.location.href = '/';
              // }

              document.location.href = '/';

          });
        } else if (params.email == '' || params.pass == '' || params.pass2 == '') {
          $('#msgAuth').css('color', 'red').text("Недостаточно данных для регистрации");
        } else {
          // alert('no');
          $('#msgAuth').css('color', 'red').text("Пароли не совпадают");
        }



      });


</script>




<script>
  "use strict"
// DEVELOPER-MODE
//Эквивалент print_r() для javascript
//Пример вызова функции: alert(print_r(array));
  function print_r(arr, level) {
    var print_red_text = "";
    if(!level) level = 0;
    var level_padding = "";
    for(var j=0; j<level+1; j++) level_padding += "    ";
    if(typeof(arr) == 'object') {
        for(var item in arr) {
            var value = arr[item];
            if(typeof(value) == 'object') {
                print_red_text += level_padding + "'" + item + "' :\n";
                print_red_text += print_r(value,level+1);
    }
            else
                print_red_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
        }
    }

    else  print_red_text = "===>"+arr+"<===("+typeof(arr)+")";
    return print_red_text;
  }

  </script>

<!-- Резервный блок-версия
      <div class="group">
          <select name="sources" id="programm_title" class="
        custom-select sources" placeholder="Выбери программу">
        <?php //foreach ($programms as $programm):?>
          <option value="<?php //echo $programm['title'];?>"><?php //echo $programm['title'];?></option>
        <?php //endforeach;?>
        </select>

      </div>

      <ul class="aside-info-block">
        <li>
          <div class="form-group">
            <span class="start-datepicker">Старт группы</span>
            <div class="input-date-control">
              <input class="datepicker form-control" id="start" type="text" value=""/>
              <span class="caret"></span>
            </div>
          </div>
        </li>
        <li>
          <div class="form-group">
            <span class="start-datepicker">Финиш группы</span>
            <div class="input-date-control">
              <input class="datepicker form-control" id="finish" type="text" value=""/>
              <span class="caret"></span>
            </div>
          </div>
        </li>
        <li>
          <span class="sub-text">Участников</span>
          <span class="main-text" id="countMembers"><?php //echo count($members_of_group);?></span>
        </li>
      </ul> -->


</body>
</html>