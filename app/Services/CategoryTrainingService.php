<?php

namespace App\Services;

use App\Repository\Interfaces\CategoryTrainingRepositoryInterface;

class CategoryTrainingService
{
    protected $repo;

    public function __construct(CategoryTrainingRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function list()
    {
        return $this->repo->all();
    }
    public function listtrain($id)
    {
        return $this->repo->alltraing($id);
    }
    public function listTrainingBycategroy($id)
    {
        return $this->repo->alltraingBycategory($id);
    }
    public function find($id)
    {
        return $this->repo->find($id);
    }

    public function create(array $data)
    {
        return $this->repo->create($data);
    }

    public function update($id, array $data)
    {
        return $this->repo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repo->delete($id);
    }
}
