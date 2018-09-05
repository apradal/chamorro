<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 05/09/2018
 * Time: 16:31
 */
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;
use Carbon\Carbon;

class Utils extends Middleware
{
    public static function gtToday($dateGiven)
    {
        $date = new Carbon;
        $date = $date::now()->format('Y-m-d');
        return ($dateGiven > $date);
    }
}