<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Airway_age_group;

/**
 * Class Airways
 * @package App\Models
 * @version March 30, 2023, 6:59 pm UTC
 *
 * @property string $name_en
 * @property string $name_hu
 * @property string $name_sk
 * @property string $name_de
 */
class Airways extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'airways';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_en',
        'name_hu',
        'name_sk',
        'name_de'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name_en' => 'string',
        'name_hu' => 'string',
        'name_sk' => 'string',
        'name_de' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_en' => 'required|min:2|max:50|unique:airways',
        'name_hu' => 'required|min:2|max:50|unique:airways',
        'name_sk' => 'required|min:2|max:50|unique:airways',
        'name_de' => 'required|min:2|max:50|unique:airways'
    ];

    public static $rules_update = [
        'name_en' => 'required|min:2|max:50',
        'name_hu' => 'required|min:2|max:50',
        'name_sk' => 'required|min:2|max:50',
        'name_de' => 'required|min:2|max:50'
    ];

    
public function airway_age_groups(){
    return $this->hasMany(Airway_age_group::class,'airway_id');

}
    
}
