<?php

function convertToSEO($text){

    $turkce  = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");

    return strtolower(str_replace($turkce, $convert, $text));


}


function DateTimeFormat($date_time)

{
    $date_time = explode(" ", $date_time);
    $date = explode("-", $date_time[0]);
    $date = "$date[2].$date[1].$date[0]";

    $time = explode(":", $date_time[1]);
    $time = "$time[0]: $time[1]";
    echo "$date - $time";
}

