<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\Str;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectList = Project::orderBy('finish_date', 'desc')->get();

        foreach ($projectList as $project) {
            $project = ProjectController::formatData($project);
        }
        return view('admin.projects.index', compact('projectList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $typeList = Type::all();
        $technologiesList = Technology::all();

        return view('admin.projects.create', compact('typeList', 'technologiesList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $newProject = new Project();
        $newProject->fill($request->all());
        if($request->image) {

            $newProject->image = Storage::put('img', $request->image);
        }
        $newProject->slug = Str::slug($newProject->title);
        $newProject->save();
        $newProject->technologies()->attach($request->technologies);
        return redirect()->route('admin.project.show', ['project' => $newProject->slug])->with('messages', 'Progetto '.$newProject->title.' salvato correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {   
        $project = ProjectController::formatData($project);

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $typeList = Type::all();
        $technologiesList = Technology::all();
        return view('admin.projects.edit', compact('project', 'typeList', 'technologiesList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        


        $project->fill($request->all());
        $project->slug = Str::slug($project->title);
        if($request->image){
            if($project->image) {
                Storage::delete($project->image);
            }
            $project->image = Storage::put('img', $request->image);
        }
        $project->save();
        $project->technologies()->sync($request->technologies);
        return redirect()->route('admin.project.show', ['project' => $project->slug])->with('messages', 'Progetto '.$project->title.' modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if($project->image){
            Storage::delete($project->image);
        }
        $project->delete();
        return redirect()->route('admin.project.index')->with('messages', 'Progetto '.$project->title.' eliminato correttamente');
    }

    protected function formatData(Project $project) {
        if(!is_null($project->start_date)) {
            $project->start_date = date_format(new DateTime($project->start_date), 'd/m/y');
        } else {
            $project->start_date = 'N/D';
        }

        if(!is_null($project->finish_date)) {
            $project->finish_date = date_format(new DateTime($project->finish_date), 'd/m/y');
        } else {
            $project->finish_date = 'N/D';
        }

        if(!is_null($project->type_id)) {
            $project->type_id = $project->type->name;
        } else {
            $project->type_id = 'N/D';
        }

        return $project;
    }
}
