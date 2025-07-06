<?php
namespace App\Implementations\Repositories\Slider;

use App\Implementations\Repositories\BaseRepository;
use App\Interfaces\Repositories\Slider\ISliderRepository;
use App\Models\Slider;

class SliderRepository extends BaseRepository implements ISliderRepository {
    public function __construct(Slider $model)
    {
        parent::__construct($model);
    }

    public function getAll(array $options = []) {
        return parent::getAll(array_merge($options, [
            'orderBy' => ['order' => 'asc'],
        ]));
    }
}