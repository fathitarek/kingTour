<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Airway_age_group extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_en',
        'name_hu',
        'name_sk',
        'name_de',
        'min',
        'max',
        'price',
        'airway_id',
    ];
    protected $casts = [
        'name_en' => 'string',
        'name_hu' => 'string',
        'name_sk' => 'string',
        'name_de' => 'string',
        'min' => 'integer',
        'max' => 'integer',
        'price' => 'double',
        'airway_id' => 'integer'
    ];
}
