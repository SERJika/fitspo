<?php include(BASE_DOMAIN . '/views/header.php');?>

  <!-- Основной контент странички -->
  <div class="page page-sport-food">
    <div class="page-content container-fluid">
      <div class="row page-info-sport-food">

        <div class="col-xs-12">
          <ul class="breadcrumbs">
            <li class="active">Спортивное питание</li>
          </ul>
        </div>

        <div class="col-xs-12">
          <h1 class="page-title">Спортивное питание</h1>
        </div>
      </div>

      <div class="row page-text-content">
        <div class="col-xs-12">

          <script src="<?php echo THE_DOMAIN?>template/libs/tinymce/tinymce.min.js"></script>
          <script>
            tinymce.init({
              mode : "exact",
              elements: "content_editor",
              theme : "simple",
              //theme : "advanced",
        // language:"ru",
        // plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,precode,uploads_image",

        // Theme options
        // theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        // theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,preCode,anchor,image,uploads_image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        // theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        // theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        // theme_advanced_toolbar_location : "top",
        // theme_advanced_toolbar_align : "left",
        // theme_advanced_statusbar_location : "bottom",
        // theme_advanced_resizing : true,

        // Skin options
        //skin : "o2k7",
        //skin_variant : "silver",

        // Drop lists for link/image/media/template dialogs
        // template_external_list_url : "js/template_list.js",
        // external_link_list_url : "js/link_list.js",
        // external_image_list_url : "js/image_list.js",
        // media_external_list_url : "js/media_list.js",

        // Replace values for the template plugin
        // template_replace_values : {  username : "Some User",  staffid : "991234"  }
            });
          </script>

            <h1>Режим редактирования HTML-кода</h1>
            <form action="/sport-food-changes" method="post">
              <textarea class="content_editor" name="tinymce_1" style="width: 110%;"><?php echo($nutrilonSport) ?></textarea>
              <input type="submit" name="">
            </form>

        </div>
      </div>
    </div>
  </div>
  <!-- End Основной контент странички -->

<?php include(BASE_DOMAIN . '/views/footer.php');?>