<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // العلاقات الحالية
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_id');
    }

    // العلاقة الجديدة مع Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    // الأعمدة القابلة للملء
    protected $fillable = [
        'title',
        'price',
        'category_id',
        'subcategory_id',
        'brand_id',
        'description',
        'quantity',
        'image',
        'sales',
    ];
}
