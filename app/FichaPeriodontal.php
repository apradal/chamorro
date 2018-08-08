<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaPeriodontal extends Model
{
    protected $fillable = [
        'pacient_id',
        'reason',
        'symptom',
        'smoker',
        'smoker_desc',
        'stress',
        'stress_desc',
        'halitosis',
        'halitosis_desc',
        'sensitivity',
        'sensitivity_desc',
        'bleeding',
        'bleeding_desc',
        'family_background',
        'habits'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * get the users associate by id
     */
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function updateCard($inputs)
    {
        unset($inputs['_token']);
        unset($inputs['pacient_id_card']);
        $this->fill($inputs);
        return $this->save();

    }

}
