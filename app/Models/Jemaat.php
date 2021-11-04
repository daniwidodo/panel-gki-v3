<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Jemaat
 * @package App\Models
 * @version November 4, 2021, 4:53 am UTC
 *
 * @property string $nik
 * @property string $namaLengkap
 * @property string $kartuVaksin
 * @property string $nomorWhatsapp
 * @property string $alamatDomain
 * @property boolean $verifikasi
 */
class Jemaat extends Model
{


    public $table = 'jemaats';
    



    public $fillable = [
        'nik',
        'namaLengkap',
        'kartuVaksin',
        'nomorWhatsapp',
        'alamatDomain',
        'verifikasi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nik' => 'string',
        'namaLengkap' => 'string',
        'kartuVaksin' => 'string',
        'nomorWhatsapp' => 'string',
        'alamatDomain' => 'string',
        'verifikasi' => 'boolean',
        'ibadahId' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nik' => 'required',
        'namaLengkap' => 'required',
        // 'kartuVaksin' => 'required',
        'nomorWhatsapp' => 'required'
    ];

    public function ibadah()
    {
        return $this->belongsTo(Ibadah::class, 'ibadah_id');
    }

    
}
