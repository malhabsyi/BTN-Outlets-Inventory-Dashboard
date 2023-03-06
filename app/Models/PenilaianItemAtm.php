<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianItemAtm extends Model
{
    use HasFactory;
    protected $fillable = [
        'itematm_id',
        'penilaianitematm_name',
        'penilaianitematm_score',
        'penilaianitematm_gambar',
    ];
    public $timestamps = false;
    public function itematm()
    {
        return $this->belongsTo(ItemAtm::class,'itematm_id');
    }
}
