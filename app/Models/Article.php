<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // use HasFactory;
    protected $fillable = ['thumbnail', 'title', 'content'];

    public function ContentTextLimit(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => \Str::words(strip_tags($attributes['content']), 10, '...'),
        );
    }

    public function ThumbnailLink(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['thumbnail'] ? asset("storage/{$attributes['thumbnail']}") : $attributes['thumbnail'],
        );
    }
}
