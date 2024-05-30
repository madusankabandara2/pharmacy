<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medications = Medication::all();
        if ($medications) {
            return response()->json($medications, 200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'No medications found'
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
        $medication = Medication::create($request->all());
        if ($medication) {
            return response()->json($medication, 201);
        } else {
            return response()->json([
                'status' => 400,
                'error' => 'Medication creation failed'
            ], 400);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medication = Medication::find($id);
        if ($medication) {
            return response()->json($medication, 200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Medication not found'
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
    public function update(Request $request, $id)
    {
        $medication = Medication::find($id);
        if ($medication) {
            $medication->update($request->all());
            return response()->json($medication, 200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Medication not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $medication = Medication::find($id);
        if ($medication) {
            $medication->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Medication record deleted successfully'
            ], 200);

        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Medication not found'
            ], 404);
        }
    }

    /**
     * Remove the Soft Delete Function.
     */
    public function softDelete($id)
    {
        $medication = Medication::find($id);
        if ($medication) {
            $medication->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Medication record deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Medication not found'
            ], 404);
        }
    }
    /**
     * Remove the Permenant Delete from storage.
     */

    public function forceDelete($id)
    {
        $medication = Medication::withTrashed()->find($id);
        if ($medication) {
            $medication->forceDelete();
            return response()->json([
                'status' => 200,
                'message' => 'Medication record permanently deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Medication not found'
            ], 404);
        }
    }
}
