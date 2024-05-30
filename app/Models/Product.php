<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'created_at'
    ];

    // belongsTo
    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public static function list() {
        $product = self::all();
        return $product;
    }

    public static function store($request, $id = null) {
        $product = $request->only('name', 'category_id', 'description', 'created_at');
        $product = self::updateOrCreate(['id' => $id], $product);
    }
}
