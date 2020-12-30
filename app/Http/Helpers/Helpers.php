<?php

namespace App\Http\Helpers;


function amount($amount)
{
    $amount = substr($amount, 0, strpos($amount, "."));
    $amount = str_replace(',', '', $amount);
    return $amount = (int)$amount;
}
