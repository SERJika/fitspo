<?php

class Common
{
    /**
     * 
     * @param iarray $arr
     * @return array $netArr
     */
    
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
    
    
    /**
     * Clearing a string from tags, special characters and spaces at the beginning and end of the line
     * @param string $var
     * @return string $var
     */
    
    public static function cleanVar($var)
    {
        $var = trim($var);
        $var = htmlentities($var);
        return $var;
    }
    

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

    public static function getPDF($id)
    {
        require_once(BASE_DOMAIN . '/vendor/tecnickcom/tcpdf/tcpdf.php');

        //$text = implode(";", $text);
        //$text = 'try to get pdf';
        //$text['text'];
        
        $db = Db::getConnection();

        // $result = $db->prepare("
        //     SELECT * 
        //     FROM `members` AS m 
        //     LEFT JOIN `groups` AS g
        //     ON m.inGroup = g.numb
        //     LEFT JOIN `personCard` AS p
        //     ON m.id = p.memberID
        //     LEFT JOIN `programs` AS pr
        //     ON m.program = pr.id
        //     WHERE m.id = :id
        // ");
        // $result->bindParam(':id', $id, PDO::PARAM_INT);
        // $result->execute();
        // $member = $result->fetchAll();
        // $member = $member['0'];
        // 
        
        $member = Members::getProfileById($id);



        //$text = implode('<br />', $member);
// print_r($member);

        // /Applications/XAMPP/xamppfiles/htdocs/vm_projects/fitspo/vendor/setasign/fpdf/makefont

        // $pdf = new tcPDF('P','mm','A4');
        // $pdf->AddPage();
        // $pdf->SetFont('Arial','',14);
        // $i = 0;
        // foreach ($member as $key => $value) {
        //     $pdf->Cell(0,10,$key . " = " . $value);
        //     $i = $i + 10;
        //     $pdf->Ln();
        // }
        // for($i=1; $i<=40 ;$i++) {
        //     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
        // }
        
        // $pdf->Output('example.pdf','I');

        // create new PDF document
// создаем объект TCPDF - документ с размерами формата A4
    // ориентация - книжная
    // единицы измерения - миллиметры
    // кодировка - UTF-8
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
 
    // убираем на всякий случай шапку и футер документа
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
 
    $pdf->SetMargins(20, 20, 25); // устанавливаем отступы (20 мм - слева, 20 мм - сверху, 25 мм - справа)
    $pdf->SetAutoPageBreak(true,20); //отступ снизу 20 мм
    
    $pdf->AddPage(); // создаем первую страницу, на которой будет содержимое
 
    $pdf->SetXY(90, 25);           // устанавливаем координаты вывода текста в рамке:
                                   // 90 мм - отступ от левого края бумаги, 25 мм - от верхнего
 
    $pdf->SetDrawColor(0, 0, 200); // устанавливаем цвет рамки (синий)
    $pdf->SetTextColor(51, 51, 51); // устанавливаем цвет текста (0,200,0 = зеленый)
 
    $pdf->SetFont('dejavuserif', 'B', 16); // устанавливаем имя шрифта и его размер (9 пунктов)
    $pdf->Cell(30, 6, 'Карточка участницы', 0, 1, 'C'); // выводим ячейку с надписью шириной 30 мм и высотой 6 мм. Строка отцентрирована относительно границ ячейки
    $pdf->Ln();
        
        $avatar = Members::getAvatarByID($id);
        $pdf->Image($avatar, 155, 40, 30, '', '', '', '', false, 150, '', false, false, 1, false, false, false);

        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(20,5,"ID: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['memberID']);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(20,5,"ФИО: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['name']." ".$member['surname']);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(20,5,"Возраст: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['age']);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(20,5,"Город: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['city']);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(20,5,"Email: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['email']);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(20,5,"Рост: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['height']);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(20,5,"Вес: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['weight']);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(20,5,"Грудь: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['chest']);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(20,5,"Талия: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['waist']);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(20,5,"Бедра: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['hip']);
        $pdf->Ln(9);

        $pdf->SetFont('dejavuserif', 'B', 14);
        $pdf->Cell(0,10,"Общие вопросы");
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(32,5,"Номер группы: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['inGroup']);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(32,5,"Программа: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['title']);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(32,5,"Регистрация: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['activationDate']);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(32,5,"Старт группы: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['start']);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(32,5,"Финиш группы: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['finish']);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(32,5,"Режим: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['trainMode']);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(32,5,"Кратность: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['perWeek']);
        $pdf->Ln();

        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Спортинвентарь:");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['T1']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();

        $pdf->SetFont('dejavuserif', 'B', 14);
        $pdf->Cell(0,10,"Образ жизни и здоровье");
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(25,5,"Курение: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['smoke']);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(25,5,"Алкоголь: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['alcohol']);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Cell(25,5,"Дети: ");
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Cell(0,5,$member['children']);
        $pdf->Ln(9);
        
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Теряла ли ты когда-нибудь сознание? Во время тренировок или по какой-то другой причине? ");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H1']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Давление обычно: нормальное, пониженное, повышенное? ");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H2']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Есть ли хронические заболевания? (Например, давление, диабет, рак, высокий холестерин)? ");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H3']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Принимаешь ли какие-либо лекарства? Какие? ");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H4']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Были ли операции? Когда и почему? ");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H5']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Нет ли противопоказаний для тренировок? ");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H6']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Постоянный ли цикл месячных? ");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H7']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Пропадали ли месячные после какого-то питания и нагрузок? ");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H8']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();        
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Понимашь ли ты, что цикл может запаздывать из-за кардинальной смены деятельности (с дивана в зал)? ");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H9']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Есть ли особые жалобы на суставы или кости, которые возникают именно при занятиях спортом? ");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H10']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Случалось ли испытывать боль в груди во время тренировок? ");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H11']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Возникает ли боль в груди при отсутствии тренировок? Возникает ли боль в груди по какой-то другой причине? ");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H12']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"В каких местах возникает боль при выполнении упражнений?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H13']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Какие это упражнения?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H14']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Есть ли сколиоз?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H15']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Были ли когда-то переломы, травмы? Какие и когда были?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H16']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Принимаешь ли ты витамины? Какие?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H17']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Когда ты последний раз посещала терапевта, сдавала кровь? (Если давно, то рекомендую сдать анализы и провериться)?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['H18']);
        $pdf->Ln();
        
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 14);
        $pdf->Cell(0,10,"Образ жизни");
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Профессия? Образ жизни?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['L1']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Сколько часов в день ты сидишь?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['L2']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Какие у тебя хобби?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['L3']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Сколько воды выпиваешь за день, не считая кофе и чай?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['L4']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Занимаешься ли ты спортом (теннис, плаванье, футбол)?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['L5']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Какую обувь ты носишь на работу?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['L6']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Возникают ли у тебя стрессы на работе или дома?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['L7']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Сколько часов ты спишь?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['L8']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Стаж тренировок в зале/дома (сроки). Сколько лет без перерывов?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['L9']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Есть ли командировки или частые дальние поездки?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['L10']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Ты домохозяйка?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['L11']);
        $pdf->Ln();
        
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 14);
        $pdf->Cell(0,10,"Рассказ о себе");
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Характер, привычки, режим, стиль жизни, убеждения?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['S1']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Рацион в течение дня?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['S2']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Любимые продукты, от которых \"срывает\" голову?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['S3']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Самооценка активности и питания?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['A1']);
        $pdf->Ln();
        
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 14);
        $pdf->Cell(0,10,"Цели");
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Текущая ситуация?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['G1']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Краткосрочная цель?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['G2']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Долгосрочная цель?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['G3']);
        $pdf->Ln();
        
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 14);
        $pdf->Cell(0,10,"Пожелания к питанию");
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Допустимые ограничения в питании?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['F1']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Тип питания?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['F2']);
        $pdf->Ln();
        
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 14);
        $pdf->Cell(0,10,"Пожелания к работе в целом");
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Когда планируешь тренироваться?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['W1']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Есть возможность на работе есть из лоточков или придется меню подстраивать под столовую?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['W2']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Нет никаких препятствий носить с собой еду, заготовленную с вечера 3 месяца?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['W3']);
        $pdf->Ln();
        

        $pdf->AddPage();
        $pdf->Ln();
        $pdf->SetFont('dejavuserif', 'B', 14);
        $pdf->Cell(0,10,"Согласие на работу с тренером");
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Осознаешь ли ты, что при отсутствии живого тренера рядом вся техника безопасности ложится на твои плечи?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['P1']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Обещаешь ли оповещать меня о головокружениях, аллергиях, обмороках, дискомфортах (запоры, поносы, и т.д), которые тебя беспокоят?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['P2']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Обязуешься ли ты не публиковать эту программу и не передавать третим лицам?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['P3']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Осознаешь ли ты, что в питании трудно изобрести велосипед, и построить тело можно только преверенными методами?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['P4']);
        $pdf->Ln();
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('dejavuserif', 'B', 9);
        $pdf->Write(5,"Понимаешь ли ты, что обращаешься за программой к тренеру, который полностью доверят представленной тобой информации?");
        $pdf->Ln();
        $pdf->SetX(27);
        $pdf->SetFont('dejavuserif', '', 9);
        $pdf->Write(5,$member['P5']);
        $pdf->Ln();
        
        $pdf->Ln(20);
        //$back_face = Members::getBackFaceByID($id);
        //$pdf->Image($avatar, '', '', 30, '', '', '', '', false, 150, '', false, false, 1, false, false, false);
        
        //$content_html = '<ul><li>line-1</li><li>line-2</li></ul>';

        //$pdf->WriteHTML($content_html);

        // foreach ($member as $key => $value) {
        //     $pdf->Write(5,$key . " = " . $value);
        //         $pdf->Ln();
            
        // }

    $pdf->Output('member-'.$member['memberID'].'.pdf', 'I'); // выводим документ в браузер, заставляя его включить плагин для отображения PDF (если имеется)


    }
}