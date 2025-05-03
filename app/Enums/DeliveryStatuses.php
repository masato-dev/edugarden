<?php
namespace App\Enums;
class DeliveryStatuses {
    public static const PENDING = 0;
    public static const CONFIRMED = 1;
    public static const DELIVERED = 2;
    public static const CANCELLED = 3;

    public static function getStringStatus(int $status): string {
        return match ($status) {
            self::PENDING => 'Chờ xác nhận',
            self::CONFIRMED => 'Đang giao',
            self::DELIVERED => 'Đã giao',
            self::CANCELLED => 'Đã huỷ',
            default => 'Không rõ',
        };
    }
}