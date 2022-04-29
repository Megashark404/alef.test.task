<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'classes';

    public function students(){
    	return $this->hasMany(Student::class, 'class_id','id');
    }

    public function lections(){
    	return $this->belongsToMany(Lection::class, 'study_plans', 'class_id', 'lection_id');
    }
}