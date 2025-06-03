<?php
namespace App\Utils;

use DiDom\Document;
use Illuminate\Support\Str;

class StringUtil {
    public static function toSlug($str): string {
        return Str::slug($str);
    }
    
    public static function removeScriptTags($html): string {
        $doc = new Document($html);
        foreach ($doc->find('script') as $script) {
            $script->remove();
        }
        return $doc->text();
    }

    public static function createVietQRImageUrl($amount, $addInfo = 'Dâng hiến cho Edugarden'): string {
        $url = env('VIETQR_IMAGE_URL');
        $bankId = env('VIETQR_BANK_ID');
        $accountNo = env('VIETQR_ACCOUNT_NO');
        $imageTemplate = env('VIETQR_IMAGE_TEMPLATE', 'compact2.jpg');
        $encodedAddInfo = urlencode($addInfo);
        return "$url/$bankId-$accountNo-$imageTemplate?amount=$amount&addInfo=$encodedAddInfo";
    }
}