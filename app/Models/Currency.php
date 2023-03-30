<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Currency
 * @package App\Models
 * @version March 28, 2023, 7:21 pm UTC
 *
 * @property string $name
 * @property number $rate
 * @property number $profit
 * @property number $final_rate
 */
class Currency extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'currencies';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'rate',
        'profit',
        'final_rate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'rate' => 'double',
        'profit' => 'double',
        'final_rate' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:2|max:20|unique:currencies',
        'rate' => 'required|numeric',
        'profit' => 'required|numeric',
        'final_rate' => 'required|numeric'
    ];


    public static $rules_update = [
        'name' => 'required|min:2|max:20',
        'rate' => 'required|numeric',
        'profit' => 'required|numeric',
        'final_rate' => 'required|numeric'
    ];
    
}
