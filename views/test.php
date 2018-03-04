<?php //include(BASE_DOMAIN . '/views/header-profile.php');

// echo PHP_EOL;
// echo $imgPath = Uploads::getImgPath($id, '4.jpeg');
//         print_r(Uploads::getImgSize($imgPath));
?>
<?php include(BASE_DOMAIN . '/views/header.php');?>

<!-- Основной контент странички -->
  <div class="page single-page-user-setting">
    <div class="container-fluid">
      <div class="row page-info-user">

        <div class="col-xs-13 col-sm-6">
          <ul class="breadcrumbs">
            <li class="active">Анкета</li>
          </ul>

          <h1 class="page-title">Анкета</h1>
        </div>
      </div>

      <form class="row page-content page-content-anketa" enctype="multipart/form-data"  method="post" action="/test/<?php echo $id ?>" id="testForm">
      <!-- <form class="row page-content page-content-anketa" enctype="multipart/form-data"  method="post" action="/handlers/endpoint.php" id="questionnareForm"> -->
        <input type="hidden" name="profileID" value="<?php echo $id ?>" />

        <section>
          <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
          <p style="font-size: 20px;">
            <span style="display: inline-block; width: 140px;">Аватарка:</span>
            <input style="display: inline-block; margin-left: 20px; font-size: 16px;" type="file" name="avatar" /></p>
          <p>
          <p style="font-size: 20px;">
            <span style="display: inline-block; width: 140px;">Вид спереди:</span>
            <input style="display: inline-block; margin-left: 20px; font-size: 16px;" type="file" name="front" />
          </p>
          <p style="font-size: 20px;">
            <span style="display: inline-block; width: 140px;">Вид сзади:</span>
            <input style="display: inline-block; margin-left: 20px; font-size: 16px;" type="file" name="back" />
          </p>
          <p style="font-size: 20px;">
            <span style="display: inline-block; width: 140px;">Вид сбоку:</span>
            <input style="display: inline-block; margin-left: 20px; font-size: 16px;" type="file" name="side[]" multiple="true" />
          </p>

<?php 
// $thedir = BASE_DOMAIN . '/template/img/members/' . $id . '/';
// $src = THE_DOMAIN . '/template/img/members/' . $id . '/';
// // echo $thedir;
// if ($handle = opendir($thedir)) {
//     // echo "Дескриптор каталога: $handle\n";
//     // echo "Записи:\n";

//     /* Именно этот способ чтения элементов каталога является правильным. */
//     while (false !== ($entry = readdir($handle))) {
//         // echo "$entry\n";
//       if (fnmatch("avatar-*", $entry )) {
//         // echo 'Hi........';
//         echo '<img src="' . $src . $entry . '" alt="Аватарка-' . $id . '" />';
//       }
// // if (!fnmatch("avatar([\-A-Za-zА-Яа-яЁё0-9]+)", $entry)) {
// //   echo "нашли аватарку ..." . $entry;
// // }
//     }

//     // /* Это НЕВЕРНЫЙ способ обхода каталога. */
//     // while ($entry = readdir($handle)) {
//     //     echo "$entry\n";
//     // }

//     closedir($handle);
// }



 ?>

           <!-- <img src="/template/img/members/<?php //echo $id ?>/<?php //echo glob('avatar.*') ?>" alt="placeholder+image"> -->
          <!-- <div id="fine-uploader-gallery"></div> -->
          <!-- шаблон разметки для загруженных фото -->
          <!-- <script type="text/template" id="qq-template-gallery">
            <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Переместите сюда файлы">
                <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                    <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
                </div>
                <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                    <span class="qq-upload-drop-area-text-selector"></span>
                </div>
                <div class="qq-upload-button-selector qq-upload-button btn-default btn-default-white waves waves-effect waves-grey">
                    <div>Добавить</div>
                </div>
                <span class="qq-drop-processing-selector qq-drop-processing">
                    <span>Файлы загружаются</span>
                    <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
                </span>
                <ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
                    <li>
                        <div class="qq-thumbnail-wrapper">
                            <img class="qq-thumbnail-selector" qq-server-scale>
                        </div>
                        <button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>
                    </li>
                </ul>

                <dialog class="qq-alert-dialog-selector">
                    <div class="qq-dialog-message-selector"></div>
                    <div class="qq-dialog-buttons">
                        <button type="button" class="qq-cancel-button-selector">Закрыть</button>
                    </div>
                </dialog>

                <dialog class="qq-confirm-dialog-selector">
                    <div class="qq-dialog-message-selector"></div>
                    <div class="qq-dialog-buttons">
                        <button type="button" class="qq-cancel-button-selector">Нет</button>
                        <button type="button" class="qq-ok-button-selector">Да</button>
                    </div>
                </dialog>

                <dialog class="qq-prompt-dialog-selector">
                    <div class="qq-dialog-message-selector"></div>
                    <input type="text">
                    <div class="qq-dialog-buttons">
                        <button type="button" class="qq-cancel-button-selector">Отмена</button>
                        <button type="button" class="qq-ok-button-selector">Да</button>
                    </div>
                </dialog>
            </div>
          </script> -->
          <!-- end шаблон разметки для загруженных фото -->

<a href="javascript:void(0)" id="testSubmit" class="btn-default waves waves-effect waves-light">Отправить анкету</a>
        </section>

      </form>
      <!-- <section class="final clearfix">
        <a href="javascript:void(0)" id="questionnareSubmit" class="btn-default waves waves-effect waves-light">Отправить анкету</a>
      </section> -->

      <img src="/img/<?php echo $id ?>/3.jpg" />


    </div>
  </div>

  <script type="text/javascript">

  </script>
   <!-- End Основной контент странички -->
  
<?php include(BASE_DOMAIN . '/views/footer.php');?>