<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianDefaultAtm extends Model
{
    use HasFactory;
    protected $fillable = [
        'itemoutlet_id',
        'penilaiandefaultatm_name',
        'penilaiandefaultatm_score',
        'penilaiandefaultatm_gambar',
    ];
    public $timestamps = false;
}
