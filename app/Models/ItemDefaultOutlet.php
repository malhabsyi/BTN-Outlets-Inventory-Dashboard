<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDefaultOutlet extends Model
{
    use HasFactory;
    protected $fillable = [
        'itemdefaultoutlet_id',
        'itemdefaultoutlet_name',
        'outlet_id',
        'itemdefaultoutlet_image',
    ];
    public $timestamps = false;
}
