<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillRestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();
        return response()->json($skills); //, 200);
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
        $data = $request->validate([
            'name' => ['string', 'required'],
            'category_id' => ['required', 'numeric'],
        ]);
        $skill = new Skill;
        $skill->name = $data['name'];
        $skill->category_id = $data['category_id'];
        $skill->save();

        return response()->json([
            'message' => 'The skill has been created successfully',
            'skill' => $skill
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $skill= Skill::find($id);
        return response()->json($skill); //, 200);
    }

    public function showWithExperiences(string $id)
    {
        $skill = Skill::where('id', '=', $id)->with('experiences')->get();
        return response()->json($skill); 
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
        Skill::find($id)->delete();

        return response()->json([
            'message' => 'The skill has been deleted successfully'
        ]);
    }
}
