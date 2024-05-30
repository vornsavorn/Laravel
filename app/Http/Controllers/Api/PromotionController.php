<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListPromotion;
use App\Http\Resources\ShowPromotion;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::all();
        $promotions = ListPromotion::collection($promotions);
        return response()->json(['success' => true, 'data' => $promotions], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Promotion::store($request);
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'promotion created successfully'
        ], 200);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $promotion = Promotion::find($id);
        $promotion = new ShowPromotion($promotion);
        return response()->json(['success' => true, 'data' => $promotion], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Promotion::store($request, $id);
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
        //
    }
}
