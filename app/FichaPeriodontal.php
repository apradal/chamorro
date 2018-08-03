<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaPeriodontal extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'phone',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * get the users associate by id
     */
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
