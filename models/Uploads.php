<?php

class Uploads
{
    /**
     * Checks that the requested ID is a positive decimal number
     * @param numeric string $id (member's ID from URL)
     * @return array $result - false (no mistakes) or true (incorrect ID), string $log, string $msg, string handled ID
     */
    
    public static function handler_ID($id)
    {
        $numb = ctype_digit($id);
        $val = intval($id, 10);
        if ($numb && $id > 0) {
            $err = false;
            $log = '$id = ' . $val . PHP_EOL . ' Проверка ID.................... ОК' . PHP_EOL;
            $msg = '';
        } else {
            $err  = true;
            $log = 'incorrect ID = ' . $id . PHP_EOL . ' Проверка ID.................... FALSE' . PHP_EOL;
            $msg = 'Ошибка при выпонении запроса';
        }
        $result = ['err'  => $err, 'log' => $log, 'msg' => $msg, 'val' => $val];
        return $result;
    }
    
    
    /**
     * Checks the presence of the directory and if it does not exist, creates it
     * @param string $dir - directory for uploads
     * @return array $result - false (no mistakes) or true (incorrect ID), string $log, string $msg, string handled $dir
     */
    
    public static function handler_uploadDir($id)
    {
        // $uploadDir = IMG_UPLOADS;
        // $baseDir   = BASE_DOMAIN . '/';
        $dir = IMG_UPLOADS . $id . '/';
                
        $isDir = is_dir($dir);
        if (!$isDir) {
            $mkdir = mkdir($dir); // попытка установить права доступа --> права вообще не устанавливаются и папка становится недоступной
                                  // без указания прав доступа --Ю самостоятельно устанавливается в 0644
            if ($mkdir) {
                $err = false;
                $log = ' Целевая директория создана..... OK' . PHP_EOL;
                $msg = '';
            } else {
                $err = true;
                $log = ' Ошибка создания директории..... FALSE' . PHP_EOL;
                $msg = 'Ошибка при сохранении файла';
            }
        } else {
            $err = false;
            $log = ' Целевая директория найдена..... OK' . PHP_EOL;
            $msg = '';
        }
        
        $result = ['err'  => $err, 'log' => $log, 'msg' => $msg, 'val' => $dir];
        return $result;
    }
    
    
    /**
     * Check file extension
     * @param string $fileExtension
     * @return array $result - true/false, log-text, message
     */
    
    public static function handler_fileExt($fileName)
    {
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileExtension = strtolower($fileExtension);
        
        $allowedExt = array(
            'jpg', 'jpeg', 'png'
        );
        
        $deniedExt =  array(
            'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
            'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
            'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi'
        );
        
        // Если перенести ввод допустимых типов в config, то потребуется дополнительная проверка на пустоту allowed и denied архива
        if (in_array($fileExtension, $allowedExt)) {
            $err = false;
            $log = ' Проверка расширения файла...... ОК' . PHP_EOL;
            $msg = '';
        } elseif (in_array($fileExtension, $deniedExt)) {
            $err = true;
            $log = 'Файл имеет запрещенное расширение ( .' . $fileExtension . ' )' . PHP_EOL;
            $msg = 'Недопустимый тип файла';
        } else {
            $err = true;
            $log = 'Файл имеет неустановленное расширение ( .' . $fileExtension . ' )' . PHP_EOL;
            $msg = 'Недопустимый тип файла';
        }
        $result = ['err' => $err, 'log' => $log, 'msg' => $msg, 'val' => $fileExtension];
        return $result;
    }
    
    
    /**
     * Generates the message error loading file
     * @param integer $errCode code of the occurred error
     * @return array $uploadErr containing information about the error
     */
    
    public static function check_uploadErr($errCode)
    {
        switch ($errCode) {
            case  0:
                $log = ' Проверка ошибок предзагрузки... ОК' . PHP_EOL; //' Файл успешно подготовлен к загрузке (#0 UPLOAD_ERR_OK) ' . PHP_EOL;
                $msg = '';
                break;
            case  1:
                $log = 'The uploaded file exceeds the upload_max_filesize directive in php.ini (#1 UPLOAD_ERR_INI_SIZE) ' . PHP_EOL;
                $msg = 'Превышен размер загружаемого файла';
                break;
            case  2:
                $log = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form (#2 UPLOAD_ERR_FORM_SIZE) ' . PHP_EOL;
                $msg = 'Превышен размер загружаемого файла';
                break;
            case  3:
                $log = 'Ошибка загрузки: файл был получен только частично (#3 UPLOAD_ERR_PARTIAL) ' . PHP_EOL;
                $msg = 'Ошибка загрузки файла';
                break;
            case  4:
                $log = 'Файл не загружен (#4 UPLOAD_ERR_NO_FILE) ' . PHP_EOL;
                $msg = 'Файл не получен';
                break;
            case  6:
                $log = 'Файл не был загружен - отсутствует временная директория (#6 UPLOAD_ERR_NO_TMP_DIR) ' . PHP_EOL;
                $msg = 'Ошибка - файл не был загружен - отсутствует временная директория';
                break;
            case  7:
                $log = 'Не удалось записать файл на диск (#7 UPLOAD_ERR_CANT_WRITE) ' . PHP_EOL;
                $msg = 'Ошибка записи файла';
                break;
            case  8:
                $log = 'PHP-расширение остановило загрузку файла (#8 UPLOAD_ERR_EXTENSION) ' . PHP_EOL;
                $msg = 'Загрузки файла остановлена';
                break;
            default:
                $log = 'Файл не был загружен - неизвестная ошибка (#?) ' . PHP_EOL;
                $msg = 'Файл не был загружен - неизвестная ошибка';
                break;
        }
        $err = $errCode;
        $uploadErr = ['err' => $err, 'log' => $log, 'msg' => $msg];
        return $uploadErr;
    }
    
    
    /**
     * checks whether the file was uploaded with the POST method
     * @param string $fileName
     * @return array $result - true/false, log-text, message
     */
    
    public static function check_isUploadedFile($fileName)
    {
        if (is_uploaded_file($fileName)) {
            $err = false;
            $log = ' Проверка происхождения файла... ОК' . PHP_EOL;
            $msg = '';
        } else {
            $err = true;
            $log = 'Скрипт осановлен: неизвестное происхождение файла' . PHP_EOL;
            $msg = 'При загрузке произошла ошибка: файл не загружен';
        }
        $result = ['err' => $err, 'log' => $log, 'msg' => $msg];
        return $result;
    }
    
    
    /**
     * Check file size
     * @param string $fileSize
     * @return array $result - true/false, log-text, message
     */
    
    public static function check_fileSizeErr($fileSize)
    {
        if ($fileSize <= ALLOWED_FILE_SIZE && $fileSize > 0) {
            $err = false;
            $log = ' Проверка размера файла......... ОК' . PHP_EOL;
            $msg = '';
        } else {
            $err = true;
            $log = 'Недопустимый размер файла - ' . $fileSize . PHP_EOL;
            $msg = 'Ошибка загрузки файла. Максимально допустимый размер 5Мб';
        }
        $result = ['err' => $err, 'log' => $log, 'msg' => $msg];
        return $result;
    }
    
    
    /**
     * Checks that the downloaded file has a valid MIME type
     * @param string $fileName
     * @return array $result - true/false, log-text, message
     */
    
    public static function check_MimeType($fileName)
    {
        $mimeType = mime_content_type ($fileName);
        $allowedMIME = [
            'image/png',
            'image/jpeg' 
        ];
        if (in_array($mimeType, $allowedMIME)) {
            $err = false;
            $log = ' Проверка MIME-TYPE............. ОК' . PHP_EOL;
            $msg = '';
        } else {
            $err  = true;
            $log = ' incorrect MIME-TYPE = ' . $mimeType . PHP_EOL . ' Проверка MIME-TYPE............. FALSE' . PHP_EOL;
            $msg = 'Недопустимый тип файла';
        }
        $result = ['err'  => $err, 'log' => $log, 'msg' => $msg];
        return $result;
    }
    
    
    /**
     * Checks that the downloaded file has a allowed image type in EXIF-header
     * @param string $imgPath
     * @return array $result - true/false, log-text, message
     */
    
    public static function handler_exifImgType($imgPath)
    {
        $imgType = exif_imagetype($imgPath);
        
        $allowedTypes = [
            2,  // jpg
            3,  // png
        ];
        if (in_array($imgType, $allowedTypes)) {
            $err = false;
            $log = ' Проверка EXIF Img type......... ОК' . PHP_EOL;
            $msg = '';
        } else {
            $err  = true;
            $log = ' incorrect EXIF Img type = ' . $imgType . PHP_EOL . ' Проверка EXIF Img type......... FALSE' . PHP_EOL;
            $msg = 'Недопустимый тип файла';
        }
        $result = ['err'  => $err, 'log' => $log, 'msg' => $msg, 'val' => $imgType];
        return $result;
    }
    
    
    /**
     * Changes the format of the array of uploaded files
     * @param $_FILES
     * @return array $files
     */
    
    public static function formatArr_FILES($uploadFiles)
    {
        $files = [];
        foreach ($uploadFiles as $input_name => $values) {
            $diff = count($values) - count($values, COUNT_RECURSIVE);
            if ($diff == 0) {
            	if ($values['name'] == '') continue;
                $files[$input_name] = $values;
            } else {
                foreach($values as $k => $l) {
                    foreach($l as $m => $v) {
                    	if ($k =='name' && $v == '') break 2;
                    	$i = (int)$m + 1;
                        $files[$input_name.'_'.$i][$k] = $v;
                    }
                }
            }      
        }
        return $files;
    }
    
    
    /**
     * Handle file name
     * @param string $filePath
     * @param string $fileName
     * @param string $fileExtension
     * @return array $result - false (no mistakes) or true (incorrect fileName), string $log, string $msg, string handled fileName
     */
    
    public static function handler_fileName($id, $filePath, $fileName, $fileExtension, $key)
    {
        if ($key = 'avatar') {
            $newFileName = 'avatar-' . $id . '.jpg';
        } else {
            $fileName = pathinfo($fileName, PATHINFO_FILENAME);
            $newFileName = self::cutIllegalCharacters($fileName);
            $newFileName = self::translitCyrToLat($newFileName);
            // Добавить проверку длины имени - ограничить до N символов
            $newFileName = $newFileName . '__' . $id;
            $newFileName = self::renameFileIfExists($filePath, $newFileName, $fileExtension);
        }
        
        
        if ($newFileName) {
            $err = false;
            $log = ' Обработка имени файла.......... ОК' . PHP_EOL;
            $msg = '';
        } else {
            $err  = true;
            $log = 'incorrect fileName = "' . $fileName . '"' . PHP_EOL . ' Обработка имени файла.......... FALSE' . PHP_EOL;
            $msg = 'Недопустимый тип файла';
        }
        $result = ['err'  => $err, 'log' => $log, 'msg' => $msg, 'val' => $newFileName];
        return $result;
    }
    
    
    /**
     * Exclude symbols except permitted
     * @param string $string
     * @return string $newStr without illegal characters
     */
    
    public static function cutIllegalCharacters($string)
    {
        $pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
        $newStr = mb_eregi_replace($pattern, '-', $string);
        $newStr = mb_ereg_replace('[-]+', '-', $newStr);  // см алгоритм проверки на предмет усовершенствовать
        return $newStr;
    }
    
    
    /**
     * Transliteration of Cyrillic characters into Latin
     * @param string $string with Cyrillic characters
     * @return string $newStr of Latin characters
     */
    
    public static function translitCyrToLat($string)
    {
        $converter = array(
                'а' => 'a',   'б' => 'b',   'в' => 'v',    'г' => 'g',   'д' => 'd',   'е' => 'e',
                'ё' => 'e',   'ж' => 'zh',  'з' => 'z',    'и' => 'i',   'й' => 'y',   'к' => 'k',
                'л' => 'l',   'м' => 'm',   'н' => 'n',    'о' => 'o',   'п' => 'p',   'р' => 'r',
                'с' => 's',   'т' => 't',   'у' => 'u',    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
                'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',  'ь' => '',    'ы' => 'y',   'ъ' => '',
                'э' => 'e',   'ю' => 'yu',  'я' => 'ya', 
                
                'А' => 'A',   'Б' => 'B',   'В' => 'V',    'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
                'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',    'И' => 'I',   'Й' => 'Y',   'К' => 'K',
                'Л' => 'L',   'М' => 'M',   'Н' => 'N',    'О' => 'O',   'П' => 'P',   'Р' => 'R',
                'С' => 'S',   'Т' => 'T',   'У' => 'U',    'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
                'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',  'Ь' => '',    'Ы' => 'Y',   'Ъ' => '',
                'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
                
                ' ' => '-',   '/' => '-',   ':' => '-',
            );
        
        $newStr = strtr($string, $converter);
        return $newStr;
    }
    
    
    /**
     * Check file existance before upload, if exists, add a suffix for uniqueness
     * @param string $filePath
     * @param string $fileName
     * @param string $fileExtension
     * @return string $fileName
     */
    
    public static function renameFileIfExists($filePath, $fileName, $fileExtension)
    {
        $i = 0;
        $suffix = '';
        while (is_file($filePath . STAMP_OF_DATE . '__' . $fileName . $suffix . '.' . $fileExtension)) {
            $suffix = '(' . ++$i . ')';
        }
        $fileName = STAMP_OF_DATE . '__' . $fileName . $suffix . '.' . $fileExtension;
        return $fileName;
    }
    
    
    /**
     * checks whether the file was uploaded with the POST method
     * @param string $fileTmpLocation
     * @param string $filePath
     * @param string $fileName
     * @return array $result - false (no mistakes) or true (incorrect fileName), string $log, string $msg, string handled fileDestination
     */
    
    public static function handler_moveUploadedFile($fileTmpLocation, $filePath, $fileName)
    {
        $log  = ' Начало переноса файла...' . PHP_EOL;
        $log .= ' ...Source: ' . $fileTmpLocation . PHP_EOL;
        $log .= ' ...Target: ' . $filePath . $fileName . PHP_EOL;
        
        $fileDestination = $filePath . $fileName;
        
        $isUpload = move_uploaded_file($fileTmpLocation, $fileDestination);
        
        if ($isUpload) {
            $err  = false;
            $log .= ' Запись в целевую директорию.... OK' . PHP_EOL;
            $msg  = '';
        } else {
            $err  = true;
            $log .= 'Файл ' . $fileName . ' не был загружен (move_uploaded_file = false)' . PHP_EOL;
            $msg  = 'Не удалось загрузить файл ' . $fileName;
        }
        $result = ['err' => $err, 'log' => $log, 'msg' => $msg, 'val' => $fileDestination];
        return $result;
    }
    
    
    /**
     * checks whether the file was uploaded with the POST method
     * @param string $filePath
     * @return array $result - false (no mistakes) or true (incorrect fileName), string $log, string $msg, string handled fileDestination
     */
    
    public static function check_resizeImgToMaxAllowed($id, $imgPath, $imgType)
    {
        $image = self::getImgSize($imgPath);
        $log   = ' ...Исходный размер изображения '. $image['width'] . ' x ' . $image['height'] . PHP_EOL;
        
        $resizedImg = self::resizeImgToNorm($imgPath, $image['width'], $image['height'], $imgType);

        // $imageNew = self::getImgSize($resizedImg);
        // $imageNew = self::getImgSize($resizedImg);
        // $log   .= 'new image size = ' . $imageNew['width'] . ' x ' . $imageNew['height'] . PHP_EOL;

        $imageX = self::getImgWidth($resizedImg);
        $imageY = self::getImgHeight($resizedImg);
        $log   .= ' ...Итоговый размер изображения '. $imageX . ' x ' . $imageY . PHP_EOL;
        
        $saveImg = self::check_saveImg($id, $resizedImg, $imgPath, $imgType);
        $log .= $saveImg['log'];
        $msg  = $saveImg['msg'];
        $err  = $saveImg['err'];
        
        $result = ['err' => $err, 'log' => $log, 'msg' => $msg];
        return $result;
    }
    
    
    /**
     * Gets the image size
     * @param string $imgPath
     * @return array $imgSize of Latin characters
     */
    
    public static function getImgSize($imgPath)
    {
        list($width, $height) = getimagesize($imgPath);
        $imgSize = ['width' => $width, 'height' => $height];
        return $imgSize;
    }
    
    
    /**
     * Gets the image width
     * @param string $imgPath
     * @return imagesx($imgPath)
     */
    
    public static function getImgWidth($imgPath)
    {
        return imagesx($imgPath);
    }
    
    
    /**
     * Gets the image height
     * @param string $imgPath
     * @return imagesy($imgPath)
     */
    
    public static function getImgHeight($imgPath)
    {
        return imagesy($imgPath);
    }
    
    
    /**
     * Checks the width of the image: 
     *   if it is larger than the allowable size, it shrinks to the specified size;
     *   if less than the set one - leaves unchanged
     * @param string $imgPath
     * @param integer $width
     * @param integer $height
     * @return resource $newImage
     */
    
    public static function resizeImgToNorm($imgPath, $width, $height, $imgType)
    {
        $maxWidth = 380;
        
        if ($width > $maxWidth) {
            $k = $width / $height; // Проверять, что не нулевые значения для исключения ошибки деления наноль
            $widthNew  = $maxWidth;
            $heightNew = $widthNew / $k;
        } else {
            $widthNew  = $width;
            $heightNew = $height;
        }
        
        $newImage  = imagecreatetruecolor($widthNew, $heightNew);
        
        switch ($imgType) {
            case 2 :
                $im = imageCreateFromJpeg($imgPath);
                imagecopyresampled($newImage, $im, 0, 0, 0, 0, $widthNew, $heightNew, $width, $height);
            break;
            case 3 :
                $im = imageCreateFromPng($imgPath);
                imagecopyresampled($newImage, $im, 0, 0, 0, 0, $widthNew, $heightNew, $width, $height);
            break;
        }
        
        imagedestroy($im);
        return $newImage;
    }
    
    
    /**
     * Saves the image transferred as a file or stream
     * @param string $imgPath
     * @param string $width
     * @param string $height
     * @return resource $newImage
     */
    
    public static function check_saveImg($id, $img, $imgPath, $imgType)
    {
        $fileName = pathinfo($imgPath, PATHINFO_FILENAME);
        if ($fileName == 'avatar-' . $id . '.jpg') $imgType = 2; // Аватар сохраняем всегда в .jpg
        switch ($imgType) {
            case 2 :
                $savedImg = imagejpeg($img, $imgPath, 70);
            break;
            case 3 :
                $savedImg = imagepng($img, $imgPath, 6);
            break;
        }
        
        if ($savedImg) {
            $err = false;
            $log = ' Обработка размера изображения.. ОК' . PHP_EOL;
            $msg = '';
        } else {
            $err  = true;
            $log = ' Ошибка сохранения изображения после обработки ширины и высоты' . PHP_EOL . 
                   ' Обработка размера изображения.. FALSE' . PHP_EOL;
            $msg = 'Ошибка при сохранении файла';
        }
        $result = ['err'  => $err, 'log' => $log, 'msg' => $msg];
        return $result;
    }
    
    
    /**
     * Checks the permissions on the file and installs them in 0644
     * @param string $fileName
     * @return string $fileMode
     */
    
    public static function disableExecFiles($filePath)
    {
        $fileMode = substr(sprintf('%o', fileperms('/etc/passwd')), -4);
        if (!$fileMode == '0644') {
            $fileMode = chmod($filePath, 0644);
        }
        return $fileMode;
    }
    
    
    /**
     * Cut empty elements of array 
     * @param array $msg
     * @return array $newMsg
     */
    
    public static function cleanMsg($msg)
    {
        $newMsg = [];
        foreach ($msg as $val) {
            if ($val == '') continue;
            $newMsg[] = $val;
        };
        return $newMsg;
    }
                
                
                
    





                
    


    public static function getImg($id, $imgName)
    {
        // Рабочий вариант - через кодировку base64, но вес картинки растет на 35%
        // $path = IMG_UPLOADS .'1/1.png';
        // $type = pathinfo($path, PATHINFO_EXTENSION);
        // $data = file_get_contents($path);
        // $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        // echo $base64; // echo "<img src=\"$base64\" alt=\"\" />";
        
        //
        // $image = ImageCreateFromJpeg('007.jpg');
        // Header('Content-type image/jpeg');
        // ImageJpeg($image);  <- здесь тоже обрати внимание .. ты выдавал картинку в фаил, а не поток - а как она в браузер то попадет подумал ?
        // ImageDestroy($image);
        // 
        // 
    // $filepath = IMG_UPLOADS . $id . '/' . $imgName; 
    $filepath = $imgName; 
    
    $type = exif_imagetype($filepath); // [] if you don't have exif you could use getImageSize()
    $allowedTypes = array(
        2,  // [] jpg
        3,  // [] png
    );
    if (!in_array($type, $allowedTypes)) {
        return false;
    }
    switch ($type) {
        case 2 :
            $im = imageCreateFromJpeg($filepath);
            header('Content-Type: image/jpeg');
            imagejpeg($im);
        break;
        case 3 :
            $im = imageCreateFromPng($filepath);
            header('Content-Type: image/png');
            imagepng($im);
        break;
    }   
    imagedestroy($im);
    return true;



//     /* Пытаемся открыть */
//     $imgName = IMG_UPLOADS .'1/1.png';
//     $im = @imageCreateFromPng($imgName);

//     /* Если не удалось */
//     if(!$im)
//     {
//         /* Создаем пустое изображение */
//         $im  = imagecreatetruecolor(150, 30);
//         $bgc = imagecolorallocate($im, 255, 255, 255);
//         $tc  = imagecolorallocate($im, 0, 0, 0);

//         imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

//         /* Выводим сообщение об ошибке */
//         imagestring($im, 1, 5, 5, 'Ошибка загрузки ' . $imgname, $tc);
//     }



// header('Content-Type: image/jpeg');

// imagepng($im);
// imagedestroy($im);



// $file = IMG_UPLOADS .'1/1.png';
// if (file_exists($file)) {
//     header('Content-Description: File Transfer');
//     header('Content-Type: application/octet-stream');
//     header('Content-Disposition: attachment; filename="'.basename($file).'"');
//     header('Expires: 0');
//     header('Cache-Control: must-revalidate');
//     header('Pragma: public');
//     header('Content-Length: ' . filesize($file));
//     // readfile($file);
//     fopen($file);
//     exit;
// }





// function imageCreateFromAny($filepath) {
//     $type = exif_imagetype($filepath); // [] if you don't have exif you could use getImageSize()
//     $allowedTypes = array(
//         1,  // [] gif
//         2,  // [] jpg
//         3,  // [] png
//         6   // [] bmp
//     );
//     if (!in_array($type, $allowedTypes)) {
//         return false;
//     }
//     switch ($type) {
//         case 1 :
//             $im = imageCreateFromGif($filepath);
//         break;
//         case 2 :
//             $im = imageCreateFromJpeg($filepath);
//         break;
//         case 3 :
//             $im = imageCreateFromPng($filepath);
//         break;
//         // case 6 :
//         //     $im = imageCreateFromBmp($filepath);
//         // break;
//     }   
//     return $im; 
// } 



//     	$arFiles = array(
//     		'my_file' => array(
//     			'path' => IMG_UPLOADS .'1/22-02-2018__vid-sboku__1.png',
//     			'type' => 'image/png'
//     		)
//     	);

//     	$image = ImageCreateFromPng(IMG_UPLOADS .'1/1.png');
// Header('Content-type image/png');
// ImageJpeg($image);  
// ImageDestroy($image);

    	// $size = getimagesize (IMG_UPLOADS .'1/22-02-2018__vid-sboku__1.png');
     //    echo '--==--';
    	// print_r($size);

        # Проверяем наличие нужного ключа в массиве
    	//if (array_key_exists($_GET['id'],$arFiles)){

        # отдаем файл
    		//header("Content-type: ".$arFiles[$string]['type']);
    		//readfile($arFiles[$string]['path']);

        // } else { # файла нет
	       //  header("HTTP/1.0 404 Not Found");
	       //  die;
        // }
    }
    
    
    public static function getImgPath($id, $imgName)
    {
        $filepath = IMG_UPLOADS . $id . '/' . $imgName;
        return $filepath;
    }
    
    
    public static function showImg($imgName)
    {
        header('Content-Type: image/jpeg');
        imagejpeg($imgName);
        imagedestroy($imgName);
        return true;
    }
    
    
    /**
     * Get image type
     * @param string $fileName
     * @return string $imgType
     */
    
    public static function getImgType($imgPath)
    {
        $type = exif_imagetype($filepath); // [] if you don't have exif you could use getImageSize()
        $allowedTypes = array(
            2,  // [] jpg
            3,  // [] png
        );
        if (!in_array($type, $allowedTypes)) {
            return false;
        }
        switch ($type) {
            case 2 :
                $typeName = 'jpg';
            break;
            case 3 :
                $typeName = 'png';
            break;
            default :
                $typeName = false;
            break;
        }
        return $typeName;
    }
    
    
    public static function getResizedImg($imgPath, $width, $height) 
    {   
        $k = $width / $height;
        $widthNew  = 320;
        $heightNew = $widthNew / $k;
        $newImage  = imagecreatetruecolor($widthNew, $heightNew);

        
        $filepath = $imgPath;
        
        $type = exif_imagetype($filepath); // [] if you don't have exif you could use getImageSize()
        $allowedTypes = array(
            2,  // [] jpg
            3,  // [] png
        );
        if (!in_array($type, $allowedTypes)) {
            return false;
        }
        switch ($type) {
            case 2 :
                $im = imageCreateFromJpeg($filepath);
                imagecopyresampled($newImage, $im, 0, 0, 0, 0, $widthNew, $heightNew, $width, $height);
                header('Content-Type: image/jpeg');
                imagejpeg($newImage);
            break;
            case 3 :
                $im = imageCreateFromPng($filepath);
                imagecopyresampled($newImage, $im, 0, 0, 0, 0, $widthNew, $heightNew, $width, $height);
                header('Content-Type: image/png');
                imagepng($newImage);
            break;
        }   

        imagedestroy($im);
        return true;
    }
}