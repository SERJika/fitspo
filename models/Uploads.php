<?php

class Uploads
{
    /**
     * Changes the format of the array of uploaded files
     * @return array $result - integer $id, string $err, string $log
     * @param $id - member's ID
     */
    
    public static function checkRequestID($id__)
    {
        $id = intval($id__, 10);
        if ($id == $id__ && $id > 0) {
            $res = $id;
            $log = 'Запрос на сохранение изображений для клиента с $id = ' . $id . PHP_EOL;
            $msg = '';
        } else {
            $res  = 0;
            $log = 'MISTAKE: $id = ' . $id__ . ' => \'Ошибка при выпонении запроса\'' . PHP_EOL;
            $msg = 'Ошибка при выпонении запроса';
        }
        $result = ['res'  => $res, 'log' => $log, 'msg' => $msg];
        return $result;
    }
    
    
    /**
     * Changes the format of the array of uploaded files
     * @return array $files
     * @param $_FILES
     */
    
    public static function uploadArrayReformat()
    {
        $files = [];
        foreach ($_FILES as $input_name => $values) {
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
     * Upload file to target directory
     * @return array $result - true/false, log-text, message
     * @param integer $id, string $file, string $filePath
     */
    
    public static function getMimeType($fileName)
    {
        $finfo = new finfo(FILEINFO_MIME); // возвращает mime-тип а-ля mimetype расширения // FILEINFO_MIME

        /* получить mime-type для указанного файла */
        $mimeType = $finfo->file($fileName);
        
        return $mimeType;
    }
    
    
    /**
     * Cut empty elements of array 
     * @return array $msg
     * @param array $msg
     */
    
    public static function userMsg($msg)
    {
        $newMsg = [];
        foreach ($msg as $key => $val) {
        	if ($val == 0) continue;
        	$newMsg[] = $val;
        };
        return $newMsg;
    }
    
    
    /**
     * check target directory existence^ if not - create it 
     * @return true
     * @param string $filePath
     */
    
    public static function isDir($filePath)
    {
        if (!is_dir($filePath)) mkdir($filePath);
        return true;
    }
    
    
    /**
     * check whether file upload 
     * @return string $fileName
     * @param string $fileName, string $fileExtension, string $filePath
     */
    
    public static function moveUploadedFile($fileTmpLocation, $filePath, $fileName)
    {
        $isUpload = move_uploaded_file($fileTmpLocation, $filePath . $fileName);
        if ($isUpload) {
            $res = false;
            $log = ' Запись в целевую директорию.... OK' . PHP_EOL;
            $msg = '';
        } else {
            $res = true;
            $log = 'Файл ' . $fileName . ' не был загружен (move_uploaded_file = false)' . PHP_EOL;
            $msg = 'Не удалось загрузить файл ' . $fileName;
        }
        $result = ['res' => $res, 'log' => $log, 'msg' => $msg];
        return $result;
    }
    
    
    /**
     * Check file existance before upload, if exists, add a suffix for uniqueness
     * @return string $fileName
     * @param string $fileName, string $fileExtension, string $filePath
     */
    
    public static function checkFileExistence($fileName, $fileExtension, $filePath)
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
     * @return array $result - true/false, log-text, message
     * @param string $fileName
     */
    
    public static function isUploadedFile($fileName)
    {
        if (is_uploaded_file($fileName)) {
        	$res = false;
            $log = ' Проверка происхождения файла... ОК' . PHP_EOL;
            $msg = '';
        } else {
        	$res = true;
            $log = 'Скрипт осановлен: неизвестное происхождение файла' . PHP_EOL;
            $msg = 'При загрузке произошла ошибка: файл не загружен';
        }
        $result = ['res' => $res, 'log' => $log, 'msg' => $msg];
        return $result;
    }
    
    
    /**
     * Check file size
     * @return array $result - true/false, log-text, message
     * @param string $fileSize
     */
    
    public static function chekErrorFileSize($fileSize)
    {
        if ($fileSize <= ALLOWED_FILE_SIZE && $fileSize > 0) {
            $res = false;
            $log = ' Проверка размера файла......... ОК' . PHP_EOL;
            $msg = '';
        } else {
            $res = true;
            $log = 'Недопустимый размер файла - ' . $fileSize . PHP_EOL;
            $msg = 'Ошибка загрузки файла. Максимально допустимый размер 5Мб';
        }
        $result = ['res' => $res, 'log' => $log, 'msg' => $msg];
        return $result;
    }
    
    
    /**
     * Check file extension
     * @return array $result - true/false, log-text, message
     * @param string $fileName
     */
    
    public static function chekAllowedFileExtension($fileExtension)
    {
        $fileExtension = strtolower($fileExtension);
        
        $allowed = array(
            'jpg', 'jpeg', 'png'
        );
        
        $denied =  array(
            'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
            'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
            'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi'
        );
        
        if (!empty($allowed) && in_array($fileExtension, $allowed)) {
            $res = false;
            $log = ' Проверка расширения файла...... ОК' . PHP_EOL;
            $msg = '';
        } elseif (!empty($denied) && in_array($fileExtension, $denied)) {
            $res = true;
            $log = 'Файл имеет запрещенное расширение ( .' . $fileExtension . ' )' . PHP_EOL;
            $msg = 'Недопустимый тип файла';
        } else {
            $res = true;
            $log = 'Файл имеет неустановленное расширение ( .' . $fileExtension . ' )' . PHP_EOL;
            $msg = 'Недопустимый тип файла';
        }
        $result = ['res' => $res, 'log' => $log, 'msg' => $msg];
        return $result;
    }
    
    
    /**
     * Generates the message error loading file
     * @return array $uploadMsg containing information about the error
     * @param integer $errCode code of the occurred error
     */
    
    public static function uploadErrMsg($errCode)
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
        $res = $errCode == 0 ? false : true; 
        $uploadMsg = ['res' => $res, 'log' => $log, 'msg' => $msg];
        return $uploadMsg;
    }
    
    
    /**
     * Exclude symbols except permitted
     * @return string $newStr without illegal characters
     * @param string $string string 
     */
    
    public static function cutIllegalCharacters($string)
    {
        $pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
        $newStr = mb_eregi_replace($pattern, '-', $string);
        $newStr = mb_ereg_replace('[-]+', '-', $newStr);
        return $newStr;
    }
    
    
    /**
     * Transliteration of Cyrillic characters into Latin
     * @return string $newStr of Latin characters
     * @param string $string with Cyrillic characters
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


    public static function showImg($id, $imgName)
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
    
    
    public static function getImgWidth($imgName)
    {
        return imagesx($imgPath);
    }
    
    
    public static function getImgHeight($imgPath)
    {
        return imagesy($imgPath);
    }
    
    
    public static function getImgSize($imgPath)
    {
        list($width, $height) = getimagesize($imgPath);
        $img = ['width' => $width, 'height' => $height];
        return $img;
    }


    public static function resizeImgToNorm($imgPath)
    {
        list($width, $height) = getimagesize($imgPath);
        $img = ['width' => $width, 'height' => $height];
        return $img;
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