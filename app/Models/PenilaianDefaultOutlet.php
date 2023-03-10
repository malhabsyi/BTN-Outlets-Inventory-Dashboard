<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianDefaultOutlet extends Model
{
    use HasFactory;
    protected $fillable = [
        'itemoutlet_id',
        'penilaiandefaultoutlet_name',
        'penilaiandefaultoutlet_score',
        'penilaiandefaultoutlet_gambar',
    ];
    public $timestamps = false;
}
