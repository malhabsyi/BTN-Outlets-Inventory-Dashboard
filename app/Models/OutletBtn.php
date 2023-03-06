<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutletBtn extends Model
{
    use HasFactory;
    protected $fillable = [
        'outlet_id',
        'outlet_name',
        'outlet_sbh',
        'outlet_status',
        'outlet_location',
        'outlet_deadline_tanggal',
        'outlet_deadline_bulan',
        'outlet_deadline_tahun',
        'kantor_cabang_id',
        'outlet_note',
        'outlet_image',
    ];

    public function kantorcabang()
    {
        return $this->belongsTo(KantorCabang::class,'kantor_cabang_id');
    }
    public function itemoutlet()
    {
        return $this->hasMany(ItemOutlet::class);
    }
    public function atm()
    {
        return $this->hasMany(Atm::class);
    }

}
