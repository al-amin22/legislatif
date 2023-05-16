<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{
    use HasFactory;
    protected $table = "tps";
    protected $guarded = [];
    protected $fillable = [
        'nomor_tps',
        'nama_saksi',
  
        'alamat_tps_id',
    ];

    public function alamatTps()
    {
        return $this->belongsTo(AlamatTps::class, 'alamat_tps_id');
    }


    public function pemilih()
    {
        return $this->hasMany(Pemilih::class, 'id_tps');
    }
    
    
}
