<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transactionModel extends Model
{
    public $timestamps = false;
    protected $table = 'transaction';

    protected $fillable = [
        'email',
        'instalment',
        'fare',
        'status',
    ];
}
