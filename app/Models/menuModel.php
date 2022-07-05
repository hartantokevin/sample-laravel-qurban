<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menuModel extends Model
{
    protected $table = 'menu';

    protected $fillable = [
        'menu_code',
        'nama',
        'harga',
        'foto',
    ];
}
