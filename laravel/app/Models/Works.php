<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    use HasFactory;

    protected $primaryKey = 'no';
    public $incrementing = true;


    public static function getYears()
    {
        return array_column(
            self::select('year')
                ->distinct()
                ->orderby('year', 'desc')
                ->get()
                ->toArray(),
            'year'
        );
    }
}