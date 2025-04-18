<?php

namespace App\Http\Controllers;

use App\Http\Requests\Material_Rewquest;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function store(Material_Rewquest $request){
        $material= Material::create([
            'name'=>$request->name,
        ]);
        return response()->json([
            'message'=> "add material",
            '$mamterial'=> $material
        ],201);
    }


    public function update(Material_Rewquest $request,Material $material){
        $mat=Material::FindOrFail($material->id);
        $mat->update($request->all());
            return response()->json([
                "message"=>"update the data",
                "material"=>$mat
                
             ],200);        
    }

    
    public function destroy(Material $material){
        $mat=Material::FindOrFail($material->id);
        $mat->delete();
            return response()->json([
                "message"=>"delete the data",
                
             ],200);        
    }
}