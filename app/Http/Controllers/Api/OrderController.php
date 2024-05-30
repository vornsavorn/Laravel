<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return $orders;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Order::store($request);
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'Order created successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Order::store($request,$id);
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'Order updated successfully'
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
