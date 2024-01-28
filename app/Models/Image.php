<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'image'
    ];

    public function getImage()
    {
        return url('/storage/'. $this->attributes['image']);
    }

    public function setImageAttributes($value)
    {
        return $this->attributes['image'] = $value;
    }

    // Получение фотографии
    public function product()
    {
        return $this->belongsTo(Products::class, 'image_id');
    }
}
