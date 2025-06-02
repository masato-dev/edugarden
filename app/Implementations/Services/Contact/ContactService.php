<?php
namespace App\Implementations\Services\Contact;

use App\Implementations\Services\BaseService;
use App\Interfaces\Repositories\Contact\IContactRepository;
use App\Interfaces\Services\Contact\IContactService;
class ContactService extends BaseService implements IContactService {
    public function __construct(IContactRepository $repository) {
        parent::__construct($repository);
    }
}