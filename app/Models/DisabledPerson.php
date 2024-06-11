<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DisabledPerson extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'person_id',
        'disabled_id',
        'disabled_level_id'
    ];
}
