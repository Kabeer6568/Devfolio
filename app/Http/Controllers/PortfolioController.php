<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Validation\Rule;
class PortfolioController extends Controller
{

    public function userPortfolio(){

        $user = auth()->user();
        $projects = $user->projects()->get();
        $skills = $user->skills()->get();

        return view('layouts.admin.portfolio' , compact('user', 'projects', 'skills'));

    }

}
