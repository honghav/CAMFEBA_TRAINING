<?php

namespace App\Models;

use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTraining extends Model
{
    //
    use HasFactory;
    protected $table = 'category_trainings';
    protected $fillable = [
        'name',
        'description',
        'cover',
    ];
    public function trainings()
    {
        return $this->hasMany(Training::class, 'category_training_id');
    }
}
