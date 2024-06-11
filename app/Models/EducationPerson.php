<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationPerson extends Model
{
    use HasFactory, SoftDeletes;
    public $fillable = ['person_id', 'academic_level_id', 'academic_degree_id'];
}
