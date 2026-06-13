<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    
    protected $fillable = ['name',];

    // Relación Uno a Muchos (Una área tiene muchos cursos)
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }
    
    public function teachers(){
        return $this->hasMany('App\Models\Teacher');
    }
}

