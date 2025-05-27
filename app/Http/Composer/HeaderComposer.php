<?php
namespace App\Http\Composer;

use Datlechin\FilamentMenuBuilder\Models\Menu;
use Illuminate\View\View;

class HeaderComposer {
    public function compose(View $view) {
        $headerMenu = Menu::location("header");
        $view->with("menu", $headerMenu);
    }
}