<?php

namespace App\Repositories;

use App\Models\Jemaat;
use App\Repositories\BaseRepository;

/**
 * Class JemaatRepository
 * @package App\Repositories
 * @version November 4, 2021, 4:53 am UTC
*/

class JemaatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nik',
        'namaLengkap',
        'kartuVaksin',
        'nomorWhatsapp',
        'alamatDomain',
        'verifikasi'
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
        return Jemaat::class;
    }
}
