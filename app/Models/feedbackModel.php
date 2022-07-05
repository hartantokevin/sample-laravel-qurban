<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class feedbackModel extends Model
{
    public $timestamps = false;
    protected $table = 'feedback';

    protected $fillable = [
        'email',
        'comment',
    ];
}
