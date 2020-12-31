<?php

namespace App\Http\Helpers;


function amount($amount)
{
    $amount = substr($amount, 0, strpos($amount, "."));
    $amount = str_replace(',', '', $amount);
    return $amount = (int)$amount;
}

function price($value)
{
    $price = str_replace(' تومان', '', $value);
    return $price;
}

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
