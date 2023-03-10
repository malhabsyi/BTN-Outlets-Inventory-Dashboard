<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDefaultAtm extends Model
{
    use HasFactory;
    protected $fillable = [
        'itemdefaultatm_id',
        'itemdefaultatm_name',
        'atm_id',
        'itemdefaultatm_image',
    ];
    public $timestamps = false;
}
