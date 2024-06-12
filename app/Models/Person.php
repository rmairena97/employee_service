<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
    public function BankAccountData(): HasMany {
        return $this->HasMany(BankAccountData::class, 'person_id', 'id');
    }

    public function EducationPerson() : HasOne {
        return $this->hasOne(EducationPerson::class, 'person_id', 'id');
    }

    public function OccupationPerson() : HasMany {
        return $this->HasMany(OccupationPerson::class, 'person_id', 'id');
    }


    public function getResponseData() : array {
        return array(
            'cui' => $this->cui,
            'passport' => $this->passport,
            'nit' => $this->nit,
            'f_name' => $this->f_name,
            's_name' => $this->s_name,
            'other_name' => $this->other_name,
            'f_surname' => $this->f_surname,
            'l_surname' => $this->l_surname,
            'house_surname' => $this->house_surname,
            'igss' => $this->igss,
            'birth_date' => $this->birth_date,
            'age' => Carbon::parse($this->birth_date)->age,
            'children_count' => $this->children_count,
            'marital_state_id' => $this->marital_state_id,
            'gender_id' => $this->gender_id,
            'linguistic_community_id' => $this->linguistic_community_id,
            'ethnicity_id' => $this->ethnicity_id,
            'Occupations' => $this->OccupationPerson,
            'Education' => $this->EducationPerson,
            'BankingData' => $this->BankAccountData
        );
    }
}
