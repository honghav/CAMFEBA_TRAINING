<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryTraining; // Add this import

class Training extends Model
{
    //
    use HasFactory;
    protected $table = 'trainings';
    protected $fillable = [
        'title',
        'cover',
        'detail',
        'price',
        'member_price',
        'location',
        'prepare_by',
        'drive_link',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(CategoryTraining::class, 'category_id');
    }
     public function sources()
    {
        return $this->hasMany(Source::class, 'training_id');
    }
}
