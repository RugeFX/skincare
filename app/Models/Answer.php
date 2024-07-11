<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    // use HasFactory;

    protected $fillable = ['name', 'age', 'gender', 'skin_condition', 'skin_dream'];
}
