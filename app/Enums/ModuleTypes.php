<?php
namespace App\Enums;
class ModuleTypes {
    public const SLIDER = 0;
    public CONST BOOK = 1;
    public CONST BLOG = 2;
    public const PAGE = 3;
    public const SUPPORT = 4;

    public static function values(): array {
        return [
            self::SLIDER => __("Slider"),
            self::BOOK => __("Sách"),
            self::BLOG => __("Cơ đốc giáo dục"),
            self::PAGE => __("Nội dung tĩnh"),
            self::SUPPORT => __("Liên hệ"),
        ];
    }
}