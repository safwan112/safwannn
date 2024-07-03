<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'categoryId',

    ];
    protected $table = 'sub_categories';
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'subcategory_id');
    }

}
