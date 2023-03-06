<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atm extends Model
{
    use HasFactory;
    protected $fillable = [
        'atm_id',
        'atm_name',
        'atm_machine_id',
        'atm_location',
        'outlet_id',
        'kantor_cabang_id',
        'atm_deadline_tanggal',
        'atm_deadline_bulan',
        'atm_deadline_tahun',
        'atm_note',
        'atm_status',
        'atm_jenis',
    ];
    public $timestamps = false;
    public function kantorcabang()
    {
        return $this->belongsTo(KantorCabang::class,'kantor_cabang_id');
    }
    public function outlet()
    {
        return $this->belongsTo(OutletBtn::class,'outlet_id');
    }
    public function itematm()
    {
        return $this->hasMany(ItemAtm::class);
    }
}
