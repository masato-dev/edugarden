<?php

namespace App\Livewire\Common;

use Livewire\Component;
use Log;

class LocationSelector extends Component
{
    public $wCityId = null;
    public $wDistrictId = null;
    public $wWardId = null;

    public function selectItem($type, $id) {
        Log::info($id);
        if ($type == 'city_id') {
            $this->wCityId = $id;
            $this->wDistrictId = null;
            $this->wWardId = null;
        } else if ($type == 'district_id') {
            $this->wDistrictId = $id;
            $this->wWardId = null;
        } else if ($type == 'ward_id') {
            $this->wWardId = $id;
        }
    }

    public function clearItem($type) {
        if($type == 'city_id') {
            $this->wCityId = null;
            $this->wDistrictId = null;
            $this->wWardId = null;
        }

        if($type == 'district_id') {
            $this->wDistrictId = null;
            $this->wWardId = null;
        }

        if($type == 'ward_id') {
            $this->wWardId = null;
        }
    }
    public function render()
    {
        return view('livewire.common.location-selector');
    }
}
