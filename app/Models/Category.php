<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    // hasMany
    public  function product(): HasMany 
    {
        return $this->hasMany(Product::class);
    }

    

    public static function list() {
        $category = self::all();
        return $category;
    }

    public static function store($request, $id=null) {
        $category = $request->only('name', 'description');
        $category = self::updateOrCreate(['id' => $id], $category);
    }
}
