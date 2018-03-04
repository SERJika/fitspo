<?php

/**
*
*/
class UploadsController
{
    public function actionUploadFiles($id)
    {
        $log = '';
        $msg = [];
        $msg[] = ''; // исключает ошибку неустановленного значения $msg

        $countUploadedFiles = 0;

        // ID verification
        $chekID = Uploads::handler_ID($id);
        $id = $chekID['val'];
        $log .= $chekID['log'];
        $msg[] = $chekID['msg'];
        if ($chekID['err']) {
            echo $log;
            // write log to file
            return false; // if (!$chekID['res']) header('Location: ' . THE_DOMAIN . '/');
        }
        
        if ($_FILES) {
            $log .= PHP_EOL;
            $log .= '------------------------------------'           . PHP_EOL;
            $log .= '--------- ЗАГРУЗКА ФАЙЛОВ ----------'           . PHP_EOL;
            $log .= '------- ' . STAMP_OF_DATE_AND_TIME . ' -------' . PHP_EOL;
            $log .= '------------------------------------'           . PHP_EOL;
            
            $files = Uploads::formatArr_FILES($_FILES);
            
            foreach ($files as $key => $file) {
                $log .= 'Загрузка файла "' . $key . '~' . $file['name'] . '"' . PHP_EOL;
                
                $checkUploadErr = Uploads::check_uploadErr($file['error']);
                $log  .= $checkUploadErr['log'];
                $msg[] = $checkUploadErr['msg'];
                if ($checkUploadErr['err']) continue;

                $isUploadedFile = Uploads::check_isUploadedFile($file['tmp_name']);
                $log  .= $isUploadedFile['log'];
                $msg[] = $isUploadedFile['msg'];
                if ($isUploadedFile['err']) continue;
                
                $chekFileSize = Uploads::check_fileSizeErr($file['size']);
                $log  .= $chekFileSize['log'];
                $msg[] = $chekFileSize['msg'];
                if ($chekFileSize['err']) continue;
                
                $checkFileExtension = Uploads::handler_fileExt($file['name']);
                $log  .= $checkFileExtension['log'];
                $msg[] = $checkFileExtension['msg'];
                $fileExtension = $checkFileExtension['val'];
                if ($checkFileExtension['err']) continue;
                
                $checkMimeType = Uploads::check_MimeType($file['tmp_name']);
                $log  .= $checkMimeType['log'];
                $msg[] = $checkMimeType['msg'];
                if ($checkMimeType['err']) continue;
                
                $checkExifImgType = Uploads::handler_exifImgType($file['tmp_name']);
                $log  .= $checkExifImgType['log'];
                $msg[] = $checkExifImgType['msg'];
                $imgType = $checkExifImgType['val'];
                if ($checkExifImgType['err']) continue;

                // Check if Ext <> MIME <> EXIF type
                
                // set upload dir
                $checkDir = Uploads::handler_uploadDir($id);
                $log  .= $checkDir['log'];
                $msg[] = $checkDir['msg'];
                $filePath = $checkDir['val'];
                if ($checkDir['err']) continue;
                
                $checkFileName = Uploads::handler_fileName($id, $filePath, $file['name'], $fileExtension, $key);
                $log  .= $checkFileName['log'];
                $msg[] = $checkFileName['msg'];
                $fileName = $checkFileName['val'];
                if ($checkFileName['err']) continue;
                
                $isUpload = Uploads::handler_moveUploadedFile($file['tmp_name'], $filePath, $fileName);
                $log  .= $isUpload['log'];
                $msg[] = $isUpload['msg'];
                $fileUploaded = $isUpload['val'];
                if ($isUpload['err']) continue;

                $resizedImg = Uploads::check_resizeImgToMaxAllowed($id, $fileUploaded, $imgType);
                $log  .= $resizedImg['log'];
                $msg[] = $resizedImg['msg'];
                if ($resizedImg['err']) continue;

                $fileMode = Uploads::disableExecFiles($fileUploaded);
                // $log .= ' ...fileMode = ' . $fileMode . PHP_EOL;

                $log .= '-----' . PHP_EOL;
                $log .= 'Файл "' . $file['name'] . '" загружен успешно' . PHP_EOL;
                $log .= ' ...Исходный размер файла ' . round($file['size'] / 1024) . ' Кбайт' . PHP_EOL;
                $log .= ' ...Итоговый размер файла ' . round(filesize($fileUploaded) / 1024) . ' Кбайт' . PHP_EOL;
                $log .= '-----' . PHP_EOL;
                
                $countUploadedFiles++;
            }

            $log .=  PHP_EOL . 'Загружено файлов = ' . $countUploadedFiles . PHP_EOL;
            $log .= '====================================' . PHP_EOL;
            $msg[] = 'Успешно загружено файлов = ' . $countUploadedFiles;
        } else {
            $log .= 'Не получено файлов для загрузки' . PHP_EOL;
        }
        
        echo PHP_EOL;
        // print_r($msg);
        $msg = Uploads::cleanMsg($msg);
        
        Test::showLog($log);
        Test::showUserMsg($msg);

        
        $member = Members::getProfileById($id);
        
        $page = 'profileCard';
        require_once(BASE_DOMAIN . '/views/test.php');
        
        return true;
    }
    
    
    public function actionGetImg($id, $imgName)
    {
        $imgPath    = Uploads::getImgPath($id, $imgName);
        $image      = Uploads::getImgSize($imgPath);
        $resizedImg = Uploads::resizeImgToNorm($imgPath, $image['width'], $image['height']);
        Uploads::saveJpg($resizedImg, $id);
        //$img = Uploads::showImg($id, $resizedImg);
        $img = Uploads::showImg($resizedImg);
        return true;
    }
}