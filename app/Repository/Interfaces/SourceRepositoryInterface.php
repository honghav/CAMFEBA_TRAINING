<?php

namespace App\Repository\Interfaces;

interface SourceRepositoryInterface
{
    public function all();
    public function getSourcesByTrainingId($id);
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);

}
