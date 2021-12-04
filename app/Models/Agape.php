<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Agape
 * @package App\Models
 * @version December 4, 2021, 5:35 am UTC
 *
 * @property string $nama_ibadah
 * @property string $tanggal_ibadah
 * @property string $jam_ibadah
 * @property string $kuota
 */
class Agape extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'agapes';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama_ibadah',
        'tanggal_ibadah',
        'jam_ibadah',
        'kuota'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_ibadah' => 'string',
        'tanggal_ibadah' => 'date',
        'jam_ibadah' => 'string',
        'kuota' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
