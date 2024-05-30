<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::list();
        $category = CategoryResource::collection($category);
        return response()->json(['success' => true, 'data' => $category], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Category::store($request);
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'category created successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return response()->json(['success' => true, 'data' => $category], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        Category::store($request, $id);
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
        $category = Category::find($id);
        $category->delete();
        return response()->json([
           'success' => true,
            'data' => true,
           'message' => 'category deleted successfully'
        ], 200);
    }
}
