<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lection extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function classes() {
    	return $this->belongsToMany(ClassModel::class, 'study_plans',  'lection_id', 'class_id');
    }


}
