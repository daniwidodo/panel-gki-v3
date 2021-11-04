<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Ibadah
 * @package App\Models
 * @version November 4, 2021, 4:48 am UTC
 *
 * @property string $namaIbadah
 * @property string $imageIbadah
 * @property integer $quota
 * @property string $jam
 * @property string $tanggal
 * @property string $deskripsi
 */
class Ibadah extends Model
{


    public $table = 'ibadahs';
    



    public $fillable = [
        'namaIbadah',
        'imageIbadah',
        'quota',
        'jam',
        'tanggal',
        'deskripsi',
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'namaIbadah' => 'string',
        'imageIbadah' => 'string',
        'quota' => 'integer',
        'jam' => 'string',
        'tanggal' => 'date',
        'deskripsi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function jemaat()
    {
        return $this->hasMany(Jemaat::class);
    }

    
}
