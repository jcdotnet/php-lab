<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryRestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories); 
    }

    public function indexWithSkills()
    {
        $categories = Category::where('slug', '!=', 'uncategorized')->with('skills')->get();
        return response()->json($categories);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return response()->json($category);  
    }

    public function showWithSkills(string $id)
    {   
        $category = Category::where('id', '=', $id)->with('skills')->get();
        return response()->json($category);
    }

    public function showBySlug(string $slug)
    {
        $category = Category::where('slug', $slug)->get();
        return response()->json($category);
    }

    public function showBySlugWithSkills(string $slug)
    {
        $category = Category::where('slug', $slug)->with('skills')->get();
        return response()->json($category);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
