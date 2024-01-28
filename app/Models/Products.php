<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'count',
        'description',
        'category_id',
        'image_id'
    ];

    public function getImage()
    {
        return $this->belongsTo(Image::class, 'id');
    }

    public function getCategory()
    {
        return $this->belongsTo(Catalogs::class, 'id');
    }
}
