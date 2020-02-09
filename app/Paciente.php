<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Paciente extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'phone',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * get fichaperiodontal associated to user
     */
    public function fichaperiodontal(){
        return $this->hasOne(FichaPeriodontal::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cuadrantes() {
        return $this->hasMany(Cuadrante::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function revisions() {
        return $this->hasMany(Revision::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function limpiezas() {
        return $this->hasMany(Limpieza::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mantenimientos() {
        return $this->hasMany(Mantenimiento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nextdates() {
        return $this->hasMany(NextDate::class);
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

    /**
     * Atack the bbdd before create the pacient
     * @param $inputs
     * @return bool
     */
    protected function checkPacientBeforeCreate($inputs)
    {
        $wheres = array();

        foreach ($inputs as $key => $value) {
            $wheres[$key] = $value;
        }

        return ($this::where($wheres)->first()) ? true : false;
    }

    /**
     * Seach on bbdd is pacient exist
     * @param $letter
     * @return mixed
     */
    public function getPacientsByLetter($letter)
    {
        return $this::where('name', 'like', '%' . $letter . '%')
            ->orWhere('lastname', 'like', '%' . $letter . '%')->get();
    }

    public function getPacientByFullName($name)
    {
        $data = DB::select("select * from 
              (SELECT *, (SELECT CONCAT(REPLACE(name, ' ',''), REPLACE(lastname, ' ',''))) as FULL FROM `pacientes`)
               as a where a.FULL = '$name'");

        return ($data) ? $this::find($data[0]->id) : false;

    }

    public function getClosesNextDate() {
        $today = Carbon::now()->format('Y-m-d');
        $dates = $this->nextdates()
            ->where('next_date', '>', $today)
            ->orderBy('next_date')
            ->limit(1)
            ->first();

        return $dates;
    }

    /**
     * Get all Pacients
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function getAllPacients($limit = null, $offset = null)
    {
        $pacients = DB::table('pacientes')->select('id', 'name', 'lastname', 'phone')->get();

        return $pacients;
    }

    /**
     * Get pacients filtered by inputs
     * @param $filters
     * @return mixed
     */
    public function getPacientsWithFilters($filters)
    {
        $select = DB::table('pacientes');

        foreach ($filters as $column => $value) {
            switch ($column) {
                case 'name':
                case 'lastname':
                    $select->where($column, 'like', '%' . $value . '%');
                    break;
                default:
                    $select->where($column, '=', $value);
                    break;
            }
        }

        return $select->get();
    }

}
