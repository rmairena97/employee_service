<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cui',
        'passport',
        'nit',
        'f_name',
        's_name',
        'other_name',
        'f_surname',
        'l_surname',
        'house_surname',
        'igss',
        'birth_date',
        'children_count',
        'marital_state_id',
        'gender_id',
        'linguistic_community_id',
        'ethnicity_id'
    ];
}
