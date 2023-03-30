<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with('type', 'technologies')->paginate(4);

        return response()->json([
            'success'=> true,
            'code'=> 200,
            'message'=> 'Ok',
            'projects'=> $projects
        ]);
    }

    public function show($slug) {
        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();

        if($project) {
            return response()->json([
                'success'=> true,
                'code'=> 200,
                'message'=> 'Ok',
                'project'=> $project
            ]);
        }
        else {
            return response()->json([
                'success'=> false,
                'code'=> 404,
                'message'=> 'Not Found'
            ]);
        }
    }
}
