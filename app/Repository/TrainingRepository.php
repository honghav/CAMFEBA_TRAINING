<?php

namespace App\Repository;

use App\Models\Training;
use App\Repository\Interfaces\TrainingRepositoryInterface;

class TrainingRepository implements TrainingRepositoryInterface
{
    public function all()
    {
        return Training::join('category_trainings', 'trainings.category_id', '=', 'category_trainings.id')->select('trainings.*','category_trainings.name')->get();
    }

    public function find($id)
    {
        return Training::with('category', 'sources')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Training::create($data);
    }

    public function update($id, array $data)
    {
        $training = $this->find($id);
        $training->update($data);
        return $training;
    }

    public function delete($id)
    {
        $training = $this->find($id);
        return $training->delete();
    }
}
