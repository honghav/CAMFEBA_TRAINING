<?php

namespace App\Repository;


use App\Repository\Interfaces\CategoryTrainingRepositoryInterface;
use App\Models\CategoryTraining;

class CategoryTrainingRepository implements CategoryTrainingRepositoryInterface
{
    public function all()
    {
        return CategoryTraining::all();
    }

    public function find($id)
    {
        return CategoryTraining::findOrFail($id);
    }
    public function alltraing($id)
    {
        return CategoryTraining::with('trainings')->findOrFail($id);
    }
    public function alltraingBycategory($id)
    {
        return CategoryTraining::join('trainings','category_trainings.id','=','trainings.category_id')->where('trainings.category_id', $id)->get();
    }

    public function create(array $data)
    {
        return CategoryTraining::create($data);
    }

    public function update($id, array $data)
    {
        $category = $this->find($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        $category = $this->find($id);
        return $category->delete();
    }
}
