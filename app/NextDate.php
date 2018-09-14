<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NextDate extends Model
{
    protected $fillable = [
        'paciente_id',
        'treatment',
        'next_date',
        'closed'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * associate pacient to cuadrante
     */
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
