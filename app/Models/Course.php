<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_number',
        'day',
        'area_id',
        'training_center_id',
    ];
    // Un curso pertenece a una Área
    public function area(){
        return $this->belongsTo('App\Models\Area');
        }
    // Un curso pertenece a un Centro de Formación
    public function training_center(){
        return $this->belongsTo('App\Models\TrainingCenter');
        }
    // Un curso tiene muchos aprendices
    public function apprentices(){
        return $this->hasMany('App\Models\Apprentice');
    }
    public function teachers(){
        return $this->belongsToMany('App\Models\Teacher', 'course_teachers');
    }
}
