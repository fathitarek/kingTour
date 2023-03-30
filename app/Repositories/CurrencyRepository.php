<?php

namespace App\Repositories;

use App\Models\Currency;
use App\Repositories\BaseRepository;

/**
 * Class CurrencyRepository
 * @package App\Repositories
 * @version March 28, 2023, 7:21 pm UTC
*/

class CurrencyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'rate',
        'profit',
        'final_rate'
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
        return Currency::class;
    }
}
