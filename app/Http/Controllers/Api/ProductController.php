<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ListPromotion;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodcuts = Product::list();
        $prodcuts = ProductResource::collection($prodcuts);
        return response()->json(['success' => true, 'data' => $prodcuts], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        Product::store($request);
        return response()->json([
           'success' => true,
            'data' => true,
           'message' => 'product created successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prodcut = Product::find($id);
        $prodcut = ProductResource::collection($prodcut);
        return response()->json(['success' => true, 'data' => $prodcut], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        Product::store($request, $id);
        return response()->json([
           'success' => true,
            'data' => true,
           'message' => 'category updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
            $category = Product::find($id);
            $category->delete();
            return response()->json([
               'success' => true,
                'data' => true,
               'message' => 'category deleted successfully'
            ], 200);
        }
    }
}
