<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request) {
        $projectsList = Project::with(['type', 'technologies']);

        if($request->per_page) {

            $projectsList = $projectsList->paginate($request->per_page)->appends(['per_page'=> $request->per_page]);
        } else {
            $projectsList = $projectsList->get();
        }

        $data = [
            'status' => 'success',
            'response' => $projectsList
        ];
        return response()->json($data);
    }

    public function show(string $slug) {
        $project = Project::with(['type', 'technologies'])->where('slug', $slug)->first();

        if(!$project) {
            return response()->json([
                'status' => 'error',
            ], 404);
        }
        $data = [
            'status' => 'success',
            'response' => $project
        ];
        return response()->json($data);
    }
}
