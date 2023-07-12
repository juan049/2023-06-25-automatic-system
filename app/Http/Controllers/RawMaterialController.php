<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\RawMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $raw_materials = RawMaterial::all();
        return view('raw_material.index', compact('raw_materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::all();
        return view('raw_material.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //Valido
        $validated_raw_material = $request->validate([
            'name' => 'required|string',
            'brand' => 'required|string'
        ]);

        $areas = json_decode($request->input('areas'));
        $components = json_decode($request->input('components'), true);
        //Creo reglas para validar los componentes
        $component_rules=[
            "name" => 'required|string',
           // "percentage" => 'numeric|min:0|max:100',
            "casNumber"=>'required|string'
        ];
        //Valido que los componentes esten bien 
        foreach($components as $component) {
             $validator = Validator::make($component, $component_rules);
            if ($validator->fails()) {
                return redirect()->route('raw_material.create')
                            ->withErrors($validator)
                            ->withInput();
            } 
        }

        dd($components);
    }

    /**
     * Display the specified resource.
     */
    public function show(RawMaterial $rawMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RawMaterial $rawMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RawMaterial $rawMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RawMaterial $rawMaterial)
    {
        //
    }
}
