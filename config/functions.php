<?php

function debugPrint($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function dateDifference($date_1, $date_2, $differenceFormat = '%a' )
{
    $dateObj1 = new DateTime($date_1);
    $dateObj2 = new DateTime($date_2);

    $difference = $dateObj2->diff($dateObj1)->format($differenceFormat);

    return $difference;
}