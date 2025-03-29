<?php
namespace App\Implementations\Services;

use App\Interfaces\Repositories\IRepository;
use App\Interfaces\Services\IService;
abstract class BaseService implements IService {
    protected IRepository $repository;
    public function __construct(IRepository $repository) {
        $this->repository = $repository;
    }
    public function getAll(array $options = []) {
        return $this->repository->getAll($options);
    }
    public function getById(int $id) {
        return $this->repository->getById($id);
    }

    public function getBy(array $criteria, array $options = []) {
        return $this->repository->getBy($criteria, $options);
    }
    public function create(array $data) {
        return $this->repository->create($data);
    }
    public function update(int $id, array $data) {
        return $this->repository->update($id, $data);
    }
    public function createOrUpdate(array $criteria, array $data) {
        return $this->repository->createOrUpdate($criteria, $data);
    }
    public function delete(int $id) {
        return $this->repository->delete($id);
    }

    public function count(array $criteria = []): int {
        return $this->repository->count($criteria);
    }

    public function autoComplete(string $term, ?string $column = 'name', array $selectedColumns = ['*']) {
        return $this->repository->autoComplete($term, $column, $selectedColumns);
    }
}