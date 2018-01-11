<?php

class Common
{
	/**
	 * Returns Singl News Item with $id
	 * @param integer $id
	 */

    public static function transformGroupDate($arrWithStrDate)
    {
        foreach ($arrWithStrDate as $key_1=>$arr) {
            foreach ($arr as $key_2=>$val) {
                if ($key_2 == 'start' || $key_2 == 'finish') {
                   $arrWithStrDate[$key_1][$key_2] = self::strToDate($val);
                }
            }
        }
        return $arrWithStrDate; 
    }

	public static function dateToStr($date)
	{
		$arr = explode('.', $date);
		$dataStr = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
		return $dataStr;
	}

    public static function strToDate($date)
	{
		$arr = explode('-', $date);
		$dataStr = $arr[2] . '.' . $arr[1] . '.' . $arr[0];
		return $dataStr;
	}

    public static function showSesVal($key1, $key2, $val = '')
    {
        if (isset($_SESSION[$key1][$key2])) {
        	echo $_SESSION[$key1][$key2];
        } else {
            echo $val;
        }
        return;
    }

    public static function checkSelected($val_1, $val_2) {
    	if ($val_1 == $val_2) {
    		$attr = ' selected="selected"';
    		return print($attr);
    	} else {
    		return;
    	}
    }

    public static function cleanVar($var)
    {
        $var = trim($var);
        $var = htmlentities($var);

        return $var;
    }

    public static function cleanArr2x($arr)
    {
        $netAarr = [];
        foreach ($arr as $keyArr => $valArr) {
            foreach ($valArr as $key => $val) {
                $netArr[$keyArr][$key] = self::cleanVar( $val );
            }
        }
        return $netArr;
    }

    public static function isVal($val)
    {
        if (!isset($val) || $val == 0) return '';
        return $val;
    }

    public static function isGetVal($val, $meas = '')
    {
        if (!isset($val) || $val == 0) return '-----';
        return $val . ' ' . $meas;
    }

    public static function isGetAnsw($val, $meas = '')
    {
        if (!isset($val) || $val == 0) return 'нет ответа';
        return $val . ' ' . $meas;
    }

    public static function generatePass($numb)
    {
        $arr = array(
            'a','b','c','d','e','f',
            'g','h','i','j','k','l',
            'm','n','o','p','r','s',
            't','u','v','x','y','z',
            'A','B','C','D','E','F',
            'G','H','I','J','K','L',
            'M','N','O','P','R','S',
            'T','U','V','X','Y','Z',
            '1','2','3','4','5','6',
            '7','8','9','0','[','!',
        );
        // Генерируем пароль
        $pass = '';
        for ($i = 0; $i < $numb; $i++)
        {
            // Вычисляем случайный индекс массива
            $min = 0;
            $max = count($arr) - 1;
            $index = rand($min, $max);
            $pass .= $arr[$index];
//echo "\r\n".'$max = ' . $max . "\r\n".'$index = ' . $index . "\r\n".'$pass = ' . $pass . "\r\n";
        }
        return $pass;
    }
}