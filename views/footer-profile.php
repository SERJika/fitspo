	<!--[if lt IE 9]>
	<script src="<?php echo THE_DOMAIN?>template/libs/html5shiv/es5-shim.min.js"></script>
	<script src="<?php echo THE_DOMAIN?>template/libs/html5shiv/html5shiv.min.js"></script>
	<script src="<?php echo THE_DOMAIN?>template/libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="<?php echo THE_DOMAIN?>template/libs/respond/respond.min.js"></script>
	<![endif]-->

	<script src="<?php echo THE_DOMAIN?>template/libs/jquery/jquery.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/bootstrap/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/asscrollable/jquery.asScrollable.all.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/animsition/animsition.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/asscroll/jquery-asScroll.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/mmenu/dist/js/jquery.mmenu.min.all.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/menu-side/core.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/menu-side/site.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/menu-side/menubar.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/menu-side/asscrollable.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/Waves-0.7.5/dist/waves.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/slick/slick.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/js/form.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/js/jquery.autosize.js"></script>
  

  <script src="<?php echo THE_DOMAIN?>template/libs/fine-uploader/jquery.fine-uploader.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/calendario/moment.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/calendario/fullcalendar.min.js"></script>
  <script src="<?php echo THE_DOMAIN?>template/libs/calendario/ru.js"></script>
  
  <script src="<?php echo THE_DOMAIN?>template/js/common-profile.js"></script>
 
<script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);


  // анкета. Загрузка фотографий
  $('#fine-uploader-gallery').fineUploader({
        template: 'qq-template-gallery',
        request: {
            endpoint: '<?php echo THE_DOMAIN ?>template/libs/fine-uploader/endpoint.php'
        },
        validation: {
            allowedExtensions: ['jpeg', 'jpg', 'gif', 'png']
        }
    });

       
        // Проверка предустановленных значений радиокнопок в анкете
        $(document).ready(function () {
          checkSelectedValInProfile(2, "sources", "<?php echo $member['measure'] ?>", "select");
          checkSelectedValInProfile(7, "perWeek", "<?php echo $member['perWeek'] ?>", "select");
          checkSelectedValInProfile(3, "exPlace", "<?php echo $member['trainMode'] ?>");
          checkSelectedValInProfile(5, "activity", "<?php echo $member['A1'] ?>");
          checkSelectedValInProfile(3, "nutrilon", "<?php echo $member['F1'] ?>");
          checkSelectedValInProfile(3, "nutriType", "<?php echo $member['F2'] ?>");
          checkSelectedValInProfile(2, "exTime", "<?php echo $member['W1'] ?>");

          function checkSelectedValInProfile(iVal, id, val, inpType)
          {
            inpType = inpType || 'radio';
            var x,
                y = val;
            for (var i = 1; i <= iVal; i++) {
              x = $('#' + id + '_' + i);
              if (x.val() == y) {
                if (inpType == 'radio') {
                  x.prop("checked", true);
                }
                if (inpType == 'select') {
                  x.selected = "true";
                }
              }
            }
          }
        });
       


  </script>



</body>
</html>