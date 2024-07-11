<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosDonts extends Model
{
    // use HasFactory;
    protected $fillable  = [
        'group',
        'skin_condition',
        'skin_dream',
        'todo',
    ];
}
