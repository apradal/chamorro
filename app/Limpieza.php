<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Limpieza extends Model
{
    protected $fillable = [
        'paciente_id',
        'date',
        'observations',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * associate pacient to cuadrante
     */
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
