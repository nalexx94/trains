<?php

namespace App\Helpers;

class GlobalHelper
{

    public function regularityByArray($array){
        if (is_array($array)) {
            $resText = '';
            foreach ($array as $number) {
                switch ($number) {
                    case 0: $resText.='Пн'; break;
                    case 1: $resText.='Вт'; break;
                    case 2: $resText.='Ср'; break;
                    case 3: $resText.='Чт'; break;
                    case 4: $resText.='Пт'; break;
                    case 5: $resText.='Сб'; break;
                    case 6: $resText.='Вс'; break;
                    case 7: $resText='Ежедневно'; break;
                }
            }

            echo $resText;
        }
        else {
            echo ' - ';
        }
    }

    public function setCheckboxAttr($array,$ind) {
        if (is_array($array)) {
            if (in_array($ind,$array)) {
                echo 'checked';
            }
        }
    }

    public function checkEveryDay($array) {
        if (is_array($array)) {
            $newArray = [];
            if (in_array(7,$array)) {
                $newArray[] = 7;
                return $newArray;
            }
            else {
                return $array;
            }
        }
    }

    public function setFormatTime($time)
    {
        return date('H:i',strtotime($time.''));
    }
}