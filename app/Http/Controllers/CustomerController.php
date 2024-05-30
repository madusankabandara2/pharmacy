<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        if ($customers) {
            return response()->json($customers, 200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'No customers found'
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = Customer::create($request->all());
        if ($customer) {
            return response()->json($customer, 201);
        } else {
            return response()->json([
                'status' =>  400,
                'error' => 'Customer creation failed'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            return response()->json($customer, 200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Customer not found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->update($request->all());
            return response()->json($customer, 200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Customer not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Customer record deleted successfully'
            ], 200);

        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Customer not found'
            ], 404);
        }
    }

    /**
     * Remove the Soft Delete Function.
     */
    public function softDelete($id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Customer record deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Customer not found'
            ], 404);
        }
    }
    /**
     * Remove the Permenant Delete from storage.
     */

    public function forceDelete($id)
    {
        $customer = Customer::withTrashed()->find($id);
        if ($customer) {
            $customer->forceDelete();
            return response()->json([
                'status' => 200,
                'message' => 'Customer record permanently deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Customer not found'
            ], 404);
        }
    }
}
