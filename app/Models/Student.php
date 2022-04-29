<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function class() {
    	return $this->belongsTo(ClassModel::class, 'class_id','id');
    }

}