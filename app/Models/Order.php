<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable= ['student_id'];

    public function products(){
        return $this->belongsToMany(Product::class, 'order_products');
    }

    public static function store($request, $id = null)
    {
        $data = $request->only('student_id');
        $data = self::updateOrCreate(['id' => $id], $data);
        $data->products()->sync($request->products);
    }

    public static function list()
    {
        $data = self::all();
        return $data;
    }
}
