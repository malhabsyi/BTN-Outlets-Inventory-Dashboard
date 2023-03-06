<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOutlet extends Model
{
    use HasFactory;
    protected $fillable = [
        'itemoutlet_id',
        'itemoutlet_name',
        'outlet_id',
        'itemoutlet_note',
        'itemoutlet_image',
    ];
    public $timestamps = false;
    public function outlet()
    {
        return $this->belongsTo(OutletBtn::class,'outlet_id');
    }
    public function penilaianitemoutlet()
    {
        return $this->hasMany(PenilaianItemOutlet::class,'itemoutlet_id');
    }
}
