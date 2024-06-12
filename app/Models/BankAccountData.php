<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccountData extends Model
{
    use HasFactory;

    protected $fillable = ['person_id', 'bank_name', 'account_number'];
}
