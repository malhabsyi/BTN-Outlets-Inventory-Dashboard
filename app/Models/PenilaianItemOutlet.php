<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianItemOutlet extends Model
{
    use HasFactory;
    protected $fillable = [
        'itemoutlet_id',
        'penilaianitemoutlet_name',
        'penilaianitemoutlet_score',
        'penilaianitemoutlet_gambar',
    ];
    public $timestamps = false;
    public function itematm()
    {
        return $this->belongsTo(ItemOutlet::class,'itemoutlet_id');
    }
}
