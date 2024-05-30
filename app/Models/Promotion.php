<?php

namespace App\Models;

use Dflydev\DotAccessData\Data;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Expr\FuncCall;

class Promotion extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['title', 'discount'];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'promotion_products');
    }
    public static function list()
    {
        return self::all();
    }
    public static function store($request, $id = null)
    {
        $data = $request->only('title', 'discount');
        $data = self::updateOrCreate(['id' => $id], $data);
        $data->products()->sync($request->product_id);
        return $data;
    }
}
