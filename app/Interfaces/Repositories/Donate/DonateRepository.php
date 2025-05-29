<?php
namespace App\Interfaces\Repositories\Donate;

use App\Implementations\Repositories\BaseRepository;
use App\Implementations\Repositories\Donate\IDonateRepository;
use App\Models\Donate;
class DonateRepository extends BaseRepository implements IDonateRepository {
    public function __construct(Donate $model) {
        parent::__construct($model);
    }
}