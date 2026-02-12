<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Property::all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $property = Property::find($id);

        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        return response()->json($property);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'area' => 'required|integer',
            'image' => 'required|string',
            'energyCertification' => 'nullable|string',
            'energyType' => 'nullable|array',
            'materials' => 'nullable|array',
            'co2Emissions' => 'nullable|numeric',
            'co2Savings' => 'nullable|numeric',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
            'sustainabilityChecklist' => 'nullable|array',
            'certifications' => 'nullable|array',
        ]);

        return Property::create($validated);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $property->update($request->all());

        return $property;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return response()->json([
            'message' => 'Propiedad eliminada correctamente'
        ]);
    }
}
