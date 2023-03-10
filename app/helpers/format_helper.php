<?php

if (!function_exists('format_date')) {
    /**
     * @param string $date Tanggal dengan format YYYY-MM-DD
     * @param string $format Format Tanggal Output, 
     * DD1 -> 1, DD2 -> 01, 
     * MM1 -> 02, MM2 -> Feb, MM3 -> Februari, 
     * YY1 -> 22, YY2 ->2022
     * @return string|null null jika format tidak tepat
     */
    function format_date($date, $format = 'DD2 MM3 YY2')
    {
        /* Format Date ex. 2022-02-01
    DD1 => 1 , DD2 => 01
    MM1 => 02 , MM2 => Feb , MM3 => Februari
    YY1 => 22 , YY2 =>2022
    */
        $result_date = null;
        $mnt_list = explode(',', 'Jan,Feb,Mar,Apr,Mei,Jun,Jul,Ags,Sep,Okt,Nov,Des');
        $month_list = explode(',', 'Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember');
        $date_vals = explode('-', $date);
        if (sizeof($date_vals) === 3) {
            $day = $date_vals[2];
            $month = $date_vals[1];
            $year = $date_vals[0];
            $format_code = array('DD1', 'DD2', 'MM1', 'MM2', 'MM3', 'YY1', 'YY2');
            $format_date = array(
                (string) intval($day), // DD1
                $day, // DD2
                $month, // MM1
                $mnt_list[intval($month) - 1], // MM2
                $month_list[intval($month) - 1], // MM3
                substr($year, -2), // YY1
                $year // YY2
            );
            $result_date = str_replace($format_code, $format_date, $format);
        }
        return $result_date;
    }
}

function modify_days($date, $days = '+1')
{
    $int_date = strtotime($date);
    $result = strtotime($days . ' day', $int_date);
    return date('Y-m-d', $result);
}

function self_number_format($number, $decimal = 0)
{
    $my_number = floatval($number);
    return number_format($my_number, $decimal, ',', '.');
}

if (!function_exists('float_input')) {
    function float_input(string $number, $decimal = 2)
    {
        $numbers = explode(',', $number);
        if (!isset($numbers[1])) $numbers[1] = '0';
        $num0 = intval(str_replace('.', '', $numbers[0]));
        $num1 = str_pad(substr($numbers[1], 0, $decimal), $decimal, '0');
        return $num0 . '.' . $num1;
    }
}
