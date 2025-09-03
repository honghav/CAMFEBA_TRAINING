<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Training; // Add this import if using the relationship

class Source extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'detail',
        'training_id',
    ];

    /**
     * Source belongs to a Training.
     */
    public function training()
    {
        return $this->belongsTo(Training::class, 'training_id');
    }
}
