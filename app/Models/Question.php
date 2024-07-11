<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    // use HasFactory;
    protected $guarded = ['id'];

    public function options()
    {
        return $this->hasMany(QuestionOption::class, 'question_id');
    }

    public function IconLink(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['icon'] ? asset('storage/' . $attributes['icon']) : $attributes['icon'],
        );
    }
}
