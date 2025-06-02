<?php
namespace App\Implementations\Repositories\Contact;

use App\Implementations\Repositories\BaseRepository;
use App\Interfaces\Repositories\Contact\IContactRepository;
use App\Models\Contact;
class ContactRepository extends BaseRepository implements IContactRepository {
    public function __construct(Contact $model) {
        parent::__construct($model);
    }
}