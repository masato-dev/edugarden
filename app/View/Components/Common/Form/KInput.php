<?php

namespace App\View\Components\Common\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class KInput extends Component
{
    private ?string $id;
    private string $placeholder;
    private ?string $icon;
    private ?string $type;
    private ?string $name;

    public function __construct(?string $id = null, string $placeholder, ?string $icon = null, ?string $type = 'text', ?string $name = null) {
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->icon = $icon;
        $this->type = $type;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.common.form.k-input', [
            'id' => $this->id,
            'placeholder' => $this->placeholder,
            'icon' => $this->icon,
            'type' => $this->type,
            'name' => $this->name,
        ]);
    }
}
