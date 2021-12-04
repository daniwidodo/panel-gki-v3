<?php

namespace App\Repositories;

use App\Models\Agape;
use App\Repositories\BaseRepository;

/**
 * Class AgapeRepository
 * @package App\Repositories
 * @version December 4, 2021, 5:35 am UTC
*/

class AgapeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_ibadah',
        'tanggal_ibadah',
        'jam_ibadah',
        'kuota'
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
        return Agape::class;
    }
}
