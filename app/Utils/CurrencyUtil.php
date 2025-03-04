<?php
namespace App\Utils;
class CurrencyUtil {
    public static function toVnd($price): string {
        if (!is_numeric($price)) {
            return '0đ';
        }
        return number_format($price, 0, ',', '.') . 'đ';
    }
    
}