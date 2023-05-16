<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatTps extends Model
{
    use HasFactory;
    protected $fillable = [
        'alamat_tps',
    ];

    public function tps()
    {
        return $this->hasMany(Tps::class)->withCount('pemilih');
    }

    

    
}
