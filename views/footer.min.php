  <!--[if lt IE 9]>
  <script src="<?php echo THE_DOMAIN?>template/libs/html5shiv/es5-shim.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/html5shiv/html5shiv.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/html5shiv/html5shiv-printshiv.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/respond/respond.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/polyfill/eventListener.polyfill.min.js"></script>
  <![endif]-->

  <script src="<?php echo THE_DOMAIN?>template/libs/jquery/jquery.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/bootstrap/js/bootstrap.min.js"></script>




<!-- <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;

      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script> -->


<!-- E N T R A N C E   A N D   R E G I S T R A T I O N -->
      <script type="text/javascript">
        "use strict"

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
          $.post('/login', params, function(msg) {
            // e.preventDefault();
          var err;
          // alert(msg);
          if (msg == 1) {
            err = 'Введен некорректный логин и/или пароль';
            $('#msgAuth').text(err).css('color', 'red');
          } else {
            err = 'Авторизация пройдена успешно!';
            $('#msgAuth').text(err).css('color', 'green');
            document.location.href = '/';
          }
          });
        });


      $(document).on('click','#regist', function(e) {
        // alert('NO!!!');
          e.preventDefault();
          var params = {
            email : $('#email').val(),
            pass  : $('#pass').val(),
            pass2 : $('#pass2').val(),
          }
        
        // alert('yes!!!');

        if ( params.pass != '' && params.pass === params.pass2 ) {

          // alert('yes-'+e);

          $.post("/regist", params, function(msg) {
            // alert(msg);
            $('#msgAuth').append(msg);

              setTimeout(function(){
                  // $("#regTabl").fadeOut(2000, redir);
                  document.location.href = '/';
              },1000);

              // function redir() {
              //   document.location.href = '/';
              // }

              // document.location.href = '/';

          });
        } else if (params.email == '' || params.pass == '' || params.pass2 == '') {
          $('#msgAuth').css('color', 'red').text("Недостаточно данных для регистрации");
        } else {
          // alert('no');
          $('#msgAuth').css('color', 'red').text("Пароли не совпадают");
        }
      });


</script>


</body>
</html>