<?php 

/**
 * Get date format from date object.
 * 
 * @param $date
 * @return string
 */
function getDateFormat($date)
{
	$postfix = null;
    $prefix;
    $separators = ['/', '-', '.'];
    $separator = null;
    $dayindex;
    $monthindex;
    $yearindex;

    if(strpos($date, ' ')) {
        $d = explode(' ', $date);
        $prefix = current($d);
        $postfix = end($d);
    } else {
        $prefix = $date;
    }


    foreach ($separators as $key) {
        if (strpos($date, $key)) $separator = $key;
    }

    if (is_null($separator)) {
        return false;
    }

    $data = explode($separator, $prefix);

    $dayindex = strlen(end($data)) == 4 ? 0 : 2;

    foreach ($data as $index => $value) {
        if (!is_numeric($value)) return false;
        if(strlen($value) == 4) $yearindex = $index;
        if ($value >= 1 && $value <=12) $monthindex = $dayindex == 2 ? 1 : $index;
        if ($value >= 13 && $value <=31) $dayindex = $index;
    }
 

    $data[$dayindex] = 'd';
    $data[$monthindex] = 'm';
    $data[$yearindex] = 'Y';

    $data = implode($separator, $data);

    if (!is_null($postfix)) {
        $content = explode(':', $postfix);
        if (count($content) == 2) {
            return $data . ' H:i';
        } else {
            return $data . ' H:i:s';
        }
    }

    return $data;
}
