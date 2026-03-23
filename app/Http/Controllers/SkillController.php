<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class SkillController extends Controller
{

    public function CreateSkill(Request $request){

        $validate = $request->validate([

        'name'=> 'required|string|max:255',
        'category' => 'required|string|max:255',
        'level' => 'required|string|max:255',

        ]);

    $validate['user_id'] = auth()->id();

    $skill = Skill::create($validate);

    return redirect()->route('user.skills')->with('sucess' , 'Skill Added');
    }
}