<?php

namespace App\Services;

use App\Repository\Interfaces\SourceRepositoryInterface;

class SourceService
{
    protected $repo;

    public function __construct(SourceRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function list()
    {
        return $this->repo->all();
    }
    public function getSourcesByTrainingId($id)
    {
        return $this->repo->getSourcesByTrainingId($id);
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
    
    public function find($id)
    {
        return $this->repo->find($id);
    }
}
