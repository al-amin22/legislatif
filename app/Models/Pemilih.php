<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    use HasFactory;
    protected $table = "pemilih";
    protected $guarded = [];

    protected $fillable = [
        'nik_pemilih',
        'nama_pemilih',
        'alamat_pemilih',
        'rt_pemilih',
        'id_tps',
    ];

    public function tps()
    {
        return $this->belongsTo(Tps::class, 'id_tps');
    }
}
