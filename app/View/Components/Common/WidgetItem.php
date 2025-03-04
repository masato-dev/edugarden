<?php

namespace App\View\Components\Common;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WidgetItem extends Component
{
    private string $icon;
    private string $title;
    private string $description;
    public function __construct(string $icon, string $title, string $description)
    {
        $this->icon = $icon;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.common.widget-item', [
            'icon'=> $this->icon,
            'title'=> $this->title,
            'description'=> $this->description,
        ]);
    }
}
