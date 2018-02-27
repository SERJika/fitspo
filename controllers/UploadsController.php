<?php

/**
*
*/
class UploadsController
{
    public function actionUploadFiles($id)
    {
        if ($_FILES) {
            $msg = [];
            $msg[] = ''; // исключает ошибку неустановленного значения $msg
            $log =  '------------------------------------'. PHP_EOL;
            $log .= '------ ДОБАВЛЕНИЕ ИЗОБРАЖЕНИЙ ------' . PHP_EOL;
            $log .= '------- ' . STAMP_OF_DATE_AND_TIME . ' -------' . PHP_EOL;
            $log .= '------------------------------------'. PHP_EOL;
            $files = Uploads::uploadArrayReformat($_FILES);
            //print_r($_FILES);
            //print_r($files);

            // ID verification
            $chekID = Uploads::checkRequestID($id);
            if (!$chekID['res']) {
                $msg[] = $chekID['msg'];
                $log .= $chekID['log'];
                return false; // if (!$chekID['res']) header('Location: ' . THE_DOMAIN . '/');
            }
            $log .= PHP_EOL . 'Проверка ID... ОК' . PHP_EOL . PHP_EOL;
            $id = $chekID['res'];
            
            // set upload dir
            $filePath = IMG_UPLOADS . $id . '/';
            
            
            $countUploadedFiles = 0;
            foreach ($files as $file) {
                $log .= 'Загрузка файла "' . $file['name'] . '"' . PHP_EOL;
                
                $checkErrors = Uploads::uploadErrMsg($file['error']);
                $log  .= $checkErrors['log'];
                $msg[] = $checkErrors['msg'];
                if ($checkErrors['res']) continue;

                $isUploadedFile = Uploads::isUploadedFile($file['tmp_name']);
                $log  .= $isUploadedFile['log'];
                $msg[] = $isUploadedFile['msg'];
                if ($isUploadedFile['res']) continue;
                
                $chekFileSize = Uploads::chekErrorFileSize($file['size']);
                $log  .= $chekFileSize['log'];
                $msg[] = $chekFileSize['msg'];
                if ($chekFileSize['res']) continue;
                
                $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $checkFileExtension = Uploads::chekAllowedFileExtension($fileExtension);
                $log  .= $checkFileExtension['log'];
                $msg[] = $checkFileExtension['msg'];
                if ($checkFileExtension['res']) continue;
                
                // Проверка mime-type
                $mimeType = Uploads::getMimeType($file['tmp_name']);
                echo '$mimeType = ' . $mimeType . PHP_EOL;
                
                Uploads::isDir($filePath);
                
                $fileName = pathinfo($file['name'], PATHINFO_FILENAME);
                $fileName = Uploads::cutIllegalCharacters($fileName);
                $fileName = Uploads::translitCyrToLat($fileName);
                $fileName = $fileName . '__' . $id;
                $fileName = Uploads::checkFileExistence($fileName, $fileExtension, $filePath);
                $log .= ' Обработка имени файла.......... ОК' . PHP_EOL;
                
                $fileTmpLocation = $file['tmp_name']; 
                
                $log .= ' Начало переноса файла...' . PHP_EOL;
                $log .= ' ...Source: ' . $fileTmpLocation . PHP_EOL;
                $log .= ' ...Target: ' . $filePath . $fileName . PHP_EOL;
                $isUpload = Uploads::moveUploadedFile($fileTmpLocation, $filePath, $fileName);
                $log  .= $isUpload['log'];
                $msg[] = $isUpload['msg'];
                if ($isUpload['res']) continue; 
                $log .=' Размер файла ' . $file['size'] . ' байт' . PHP_EOL;

                $log .= 'Файл "' . $file['name'] . '" загружен успешно' . PHP_EOL . PHP_EOL;
                
                $countUploadedFiles++;
            }
            $log .= 'Загружено файлов - ' . $countUploadedFiles . PHP_EOL;
            $msg = Uploads::userMsg($msg);
            if (!$msg) $msg[] = 'Успешно загружено файлов - ' . $countUploadedFiles;
            print_r($msg);
            $log .= '===================================='. PHP_EOL;
        }
                    
        //if (isset($msg) && isset($log)){
        	@$msg = Uploads::userMsg($msg);
        	echo '=====' . PHP_EOL;
        	echo 'MSG FOR USER = ';
            print_r($msg);
            echo '=====' . PHP_EOL;
            echo PHP_EOL . @$log;
        //}    
        
        $member = Members::getProfileById($id);
        
        $page = 'profileCard';
        require_once(BASE_DOMAIN . '/views/test.php');
        
        return true;
    }
    
    
    // public function actionGetImg($id, $imgName)
    // {
    //     $img = Uploads::showImg($id, $imgName);
    //     return true;
    // }
    public function actionGetImg($id, $imgName)
    {
        // $img = Uploads::getImg($id, $imgName);
        $imgPath    = Uploads::getImgPath($id, $imgName);
        $image      = Uploads::getImgSize($imgPath);
        $resizedImg = Uploads::getResizedImg($imgPath, $image['width'], $image['height']);
        // $img        = Uploads::getImg($id, $imgPath);
        return true;
    }
}