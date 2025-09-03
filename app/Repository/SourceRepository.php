<?php

namespace App\Repository;

use App\Models\Source;
use App\Repository\Interfaces\SourceRepositoryInterface;

class SourceRepository implements SourceRepositoryInterface
{
    public function all()
    {
        return Source::with('training')->get();
    }
    public function getSourcesByTrainingId($id)
    {
        return Source::join('trainings', 'sources.training_id', '=', 'trainings.id')
            ->where('trainings.id', $id)
            ->select('sources.*')
            ->get();
    }

    public function find($id)
    {
        return Source::with('training')->findOrFail($id);
    }

    public function create(array $data)
    {
        $created = [];

    // Ensure at least one image exists
    if (!empty($data['images'])) {
        foreach ($data['images'] as $path) {
            $created[] = Source::create([
                'training_id' => $data['training_id'],
                'detail'      => $data['detail'] ?? null,
                'image'       => $path, // ✅ Always insert image
            ]);
        }
    }

    return $created;
    }

    public function update($id, array $data)
    {
        $source = $this->find($id);
        $source->update($data);
        return $source;
    }

    public function delete($id)
    {
        $source = $this->find($id);
        return $source->delete();
    }
    
}
