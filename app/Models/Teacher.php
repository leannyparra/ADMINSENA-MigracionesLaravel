<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'area_id',
        'training_center_id',
    ];
    // Un instructor pertenece a un Area
    public function area(){
        return $this->belongsTo('App\Models\Area');
    }

    // Un instructor pertenece a un Centro de Formación
    public function training_center(){
        return $this->belongsTo('App\Models\TrainingCenter');
    }
    public function courses(){
        return $this->belongsToMany('App\Models\Course', 'course_teachers');
    }
}
