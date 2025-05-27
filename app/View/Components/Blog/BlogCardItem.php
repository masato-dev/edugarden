<?php

namespace App\View\Components\Blog;

use App\Models\Blog;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogCardItem extends Component
{
    /**
     * Create a new component instance.
     */
    protected Blog|array|object $model;
    public function __construct(Blog|array|object $model)
    {
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog.blog-card-item', [
            'model'=> $this->model
        ]);
    }
}
