<?php
namespace App\Implementations\Services\Slider;

use App\Implementations\Services\BaseService;
use App\Interfaces\Repositories\Slider\ISliderRepository;
use App\Interfaces\Services\Slider\ISliderService;
class SliderService extends BaseService implements ISliderService {
    public function __construct(ISliderRepository $repository)
    {
        parent::__construct($repository);
    }
}