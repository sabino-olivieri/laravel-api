<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(?Int $perPage = 5) {

        $projectsList = Project::with(['type', 'technologies'])->paginate($perPage)->appends(['per_page'=> $perPage]);
        $data = [
            'status' => 'success',
            'response' => $projectsList
        ];
        return response()->json($data);
    }
}
