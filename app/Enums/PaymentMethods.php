<?php
namespace App\Enums;
class PaymentMethods {
    public const COD = 0;
    public const ONLINE = 1;

    public static function label(int|string $value) {
        $value = intval($value);
        return match ($value) {
            self::COD => 'Thanh toán khi nhận hàng',
            self::ONLINE => 'Thanh toán online',
            default => 'Không rõ',
        };
    }
}