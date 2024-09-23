<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $Categories=Categorie::all();
            return response()->json($Categories);
        } catch(\Exception $e )
        {
            return response()->json("probleme de categorie");}
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $categorie= new Categorie(["nomcategorie"=>$request->input("nomcategorie"),"imagecategorie"=>$request->input("imagecategorie")]);
            $categorie->save();
            return response()->json($categorie);
        } catch(\Exception $e )
        {
            return response()->json("insertion categorie probleme");}
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $categorie= Categorie::findOrFail($id);

            return response()->json($categorie);
        } catch(\Exception $e )
        {
            return response()->json("recuperation categorie impossible");}
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $categorie= Categorie::findOrFail($id);
            $categorie->delete();
            return response()->json("suppression categorie avec succes");
        } catch(\Exception $e )
        {
            return response()->json("suppression categorie impossible");}
    }
}
