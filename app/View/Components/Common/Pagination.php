<?php

namespace App\View\Components\Common;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Pagination extends Component
{
    /**
     * Create a new component instance.
     */
    protected int $perPage;
    protected string $url;
    protected string $method;
    protected string $component;
    protected string $recordType;
    protected string $rowWrappers;
    public function __construct(
        int $perPage = 20,
        string $url,
        string $method = "GET",
        string $component = "",
        string $recordType = "",
        string $rowWrappers = "row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6"
    ) {
        $this->perPage = $perPage;
        $this->url = $url;
        $this->method = $method;
        $this->component = $component;
        $this->recordType = $recordType;
        $this->rowWrappers = $rowWrappers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.common.pagination', [
            'perPage'=> $this->perPage,
            'url'=> $this->url,
            'method'=> $this->method,
            'component'=> $this->component,
            'recordType'=> $this->recordType,
            'rowWrappers'=> $this->rowWrappers
        ]);
    }
}
