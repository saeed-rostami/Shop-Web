<?php

namespace App\Http\Helpers;


function amount($amount)
{
    $amount = substr($amount, 0, strpos($amount, "."));
    $amount = str_replace(',', '', $amount);
    return $amount = (int)$amount;
}

//function price($value)
//{
//    $price = str_replace(' تومان', '', $value);
//    return $price;
//}

//
//function off($value)
//{
////    if ($value) {
//        $off = str_replace(' تومان', '', $value);
////    } else {
////        $off = str_replace('بدون تخفیف', '', $value);
////    }
//    return $off;
//}

function toPersianNum($number)
{
    $number = str_replace("1","۱",$number);
    $number = str_replace("2","۲",$number);
    $number = str_replace("3","۳",$number);
    $number = str_replace("4","۴",$number);
    $number = str_replace("5","۵",$number);
    $number = str_replace("6","۶",$number);
    $number = str_replace("7","۷",$number);
    $number = str_replace("8","۸",$number);
    $number = str_replace("9","۹",$number);
    $number = str_replace("0","۰",$number);
    return $number;
}
