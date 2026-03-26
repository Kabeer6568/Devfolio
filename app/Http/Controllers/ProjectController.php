<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function showProject(){

        $userProjects = auth()->user()->projects;

        return view('layouts.admin.projects' , compact('userProjects'));

    }

    public function createProject(Request $request){

        $validate = $request->validate([

            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000' ,
            'github_link' => 'required|string|max:255' ,
            'live_link' => 'required|string|max:255',
            'tags' => 'required|string|max:255',
            'status' => 'nullable|in:published,draft',

        ]);
        $validate['status'] = $validate['status'] ?? 'draft';
        $validate['user_id'] = auth()->id();

        $project = Project::create($validate);

        return redirect()->route('user.project')->with('success' , 'Project Created');

    }
}
