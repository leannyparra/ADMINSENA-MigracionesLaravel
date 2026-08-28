<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_number',
        'course_id',
        'training_center_id',
        'day',
        'start_date',
        'end_date',
        'modality',
        'quota',
        'available_quota',
        'status',
        'image',
    ];

    // Una oferta pertenece a un curso
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Una oferta pertenece a un centro de formación
    public function trainingCenter()
    {
        return $this->belongsTo(TrainingCenter::class);
    }
}