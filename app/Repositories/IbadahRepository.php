<?php

namespace App\Repositories;

use App\Models\Ibadah;
use App\Repositories\BaseRepository;

/**
 * Class IbadahRepository
 * @package App\Repositories
 * @version November 4, 2021, 4:48 am UTC
*/

class IbadahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'namaIbadah',
        'imageIbadah',
        'quota',
        'jam',
        'tanggal',
        'deskripsi'
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
        return Ibadah::class;
    }
}
