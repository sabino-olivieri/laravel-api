<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTechonogyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Technology;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologiesList = Technology::all();
        return view('admin.technologies.index', compact('technologiesList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechonogyRequest $request)
    {
        $newTechnology = new Technology();
        $newTechnology->fill($request->validated());
        $newTechnology->slug = Str::slug($newTechnology->name);
        $newTechnology->save();
        return redirect()->route('admin.technology.show', ['technology' => $newTechnology->slug])->with('messages', 'Tecnologia '.$newTechnology->name.' salvata correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        
        $technology->fill($request->validated());
        $technology->slug = Str::slug($technology->name);
        $technology->save();
        return redirect()->route('admin.technology.show', ['technology' => $technology->slug])->with('messages', 'Tecnologia '.$technology->name.' modificata correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technology.index')->with('messages', 'Tecnologia '.$technology->name.' eliminata correttamente');
    }
}
