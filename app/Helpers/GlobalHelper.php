<?php

namespace App\Helpers;

class GlobalHelper
{

    /*
    * get string name days by their index
    * */
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

    /*
     * Helper for checked boxes in edit
     * */
    public function setCheckboxAttr($array,$ind) {
        if (is_array($array)) {
            if (in_array($ind,$array)) {
                echo 'checked';
            }
        }
    }

    /*
     * create new array if everyday trains was checked
     * */
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

    /*
     * set format hh:mm for inputs time
     * */
    public function setFormatTime($time)
    {
        return date('H:i',strtotime($time.''));
    }
}