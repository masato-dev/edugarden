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

}