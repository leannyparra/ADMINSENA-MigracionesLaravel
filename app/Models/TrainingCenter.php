<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCenter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
    ];

    // Un Centro de Formación tiene muchos Instructores
    public function teachers(){
        return $this->hasMany('App\Models\Teacher');
    }

    public function areas(){
        return $this->hasMany('App\Models\Area');
    }
    
    // Un Centro de Formación tiene muchos Cursos
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }
}
