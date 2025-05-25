<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('Store method reached');

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'url' => 'nullable|url',
            'status' => 'required|in:Draft,Published',
            'img' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Upload image
        $imagePath = null;
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('images', 'public');
        }

        // Create project
        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->url = $request->url;
        $project->status = $request->status;
        $project->img = $imagePath;
        $project->save();

        return redirect(route('project.index'))->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('project.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'url' => 'nullable|url',
            'status' => 'required|in:Draft,Published',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('images', 'public');
            $project->img = $imagePath;
        }

        $project->title = $request->title;
        $project->description = $request->description;
        $project->url = $request->url;
        $project->status = $request->status;
        $project->save();

        return redirect()->route('project.index')->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Delete image file if exists
        if ($project->img && Storage::disk('public')->exists($project->img)) {
            Storage::disk('public')->delete($project->img);
        }

        // Delete the project from the database
        $project->delete();

        return redirect()->route('project.index')->with('success', 'Project deleted successfully.');
    }
}
