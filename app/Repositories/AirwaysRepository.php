<?php

namespace App\Repositories;

use App\Models\Airways;
use App\Repositories\BaseRepository;

/**
 * Class AirwaysRepository
 * @package App\Repositories
 * @version March 30, 2023, 6:59 pm UTC
*/

class AirwaysRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_en',
        'name_hu',
        'name_sk',
        'name_de'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Airways::class;
    }
}
