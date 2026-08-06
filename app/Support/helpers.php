<?php

use Illuminate\Support\Number;

if (! function_exists('abbreviate_number')) {
    function abbreviate_number(float $number, $precision = 2): string
    {
        if($number == 0) return 'Sin datos';
        return Number::abbreviate( $number, $precision);
    }
}

if (! function_exists('format_number')) {
    function format_number(float $number, $precision = 2): string
    {
        if($number == 0) return 'Sin datos';
        return Number::format( $number, $precision);
    }
}

if (! function_exists('format_percent')) {
    function format_percent(float $amount, float $total): string
    {
         if($amount == 0 || $total == 0) return 'Sin datos';
        return Number::format(($amount / $total) * 100, 2).'%';
    }
}
