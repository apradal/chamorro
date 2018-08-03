<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
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
    public function fichaperiodontal(){
        return $this->hasOne(FichaPeriodontal::class);
    }

    public function create($inputs)
    {
        if (!$this->checkPacientBeforeCreate($inputs)){
            foreach ($inputs as $key => $value) {
                $this->attributes[$key] = $value;
            }
            if ($this->save()) return $this;
        } else {
            return false;
        }
    }

    protected function checkPacientBeforeCreate($inputs)
    {
        $wheres = array();

        foreach ($inputs as $key => $value) {
            $wheres[$key] = $value;
        }

        return ($this::where($wheres)->first()) ? true : false;
    }

}
