<?php

namespace App\Http\Controllers;

use App\Models\Scategorie;
use Illuminate\Http\Request;

class ScategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $sCategories=Scategorie::with("categorie")->get();
            return response()->json($sCategories);
        } catch(\Exception $e )
        {
            return response()->json("probleme de scategorie");}
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $scategorie= new Scategorie(["nomscategorie"=>$request->input("nomscategorie"),"imagescategorie"=>$request->input("imagescategorie"),"categorieID"=>$request->input("categorieID")]);
            $scategorie->save();
            return response()->json($scategorie);
        } catch(\Exception $e )
        {
            return response()->json("insertion categorie probleme");}
    }
    

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        try{
            $scategorie= Scategorie::with("categorie")->findOrfail($id);

            return response()->json($scategorie);
        } catch(\Exception $e )
        {
            return response()->json("recuperation categorie impossible");}
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        try{
            $scategorie= Scategorie::findOrfail($id);
            $scategorie->update($request->all());
            return response()->json($scategorie);
        } catch(\Exception $e )
        {
            return response()->json($e->getMessage());}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try{
            $scategorie= Scategorie::findOrfail($id);
            $scategorie->delete();
            return response()->json("suppression categorie avec succes");
        } catch(\Exception $e )
        {
            return response()->json("suppression categorie impossible");}
    }
}
