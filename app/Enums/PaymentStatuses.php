<?php
namespace App\Enums;
class PaymentStatuses {
    public const NOT_PAID = 0;
    public const PAID = 1;

    public static function getStringStatus(int $status): string {
        return match ($status) {
            self::NOT_PAID => 'Chưa thanh toán',
            self::PAID => 'Thanh toán',
            default => 'Không rõ',
        };
    }
}