<?php

namespace App\View\Components\Common\Notification;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    private string $message;
    private ?string $alertType;
    /**
     * Create a new component instance.
     */
    public function __construct(string $message, ?string $alertType = null)
    {
        $this->message = $message;
        $this->alertType = $alertType;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.common.notification.alert', [
            'message' => $this->message,
            'alertType' => $this->alertType,
        ]);
    }
}
