<?php

namespace App\View\Components\Common;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Log;

class AutocompleteInput extends Component
{
    /**
     * Create a new component instance.
     */
    protected ?string $id;
    protected ?string $name;
    protected ?string $placeholder;
    protected string $queryTable;
    protected ?string $queryColumn;
    protected ?array $criteria;
    protected mixed $value;
    protected mixed $displayValue;
    protected ?array $wireModels;
    public function __construct(
        ?string $id = null,
        ?string $name = null,
        ?string $placeholder = "Tìm kiếm",
        string $queryTable,
        ?string $queryColumn = "name",
        ?array $criteria = [],
        mixed $value = null,
        mixed $displayValue = null,
        ?array $wireModels = [],
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->queryTable = $queryTable;
        $this->queryColumn = $queryColumn;
        $this->criteria = $criteria;
        $this->value = $value;
        $this->displayValue = $displayValue;
        $this->wireModels = $wireModels;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.common.autocomplete-input', [
            'id' => $this->id,
            'name' => $this->name,
            'placeholder' => $this->placeholder,
            'queryTable' => $this->queryTable,
            'queryColumn' => $this->queryColumn,
            'criteria' => $this->criteria,
            'value' => $this->value,
            'displayValue' => $this->displayValue,
            'wireModels' => $this->wireModels
        ]);
    }
}
