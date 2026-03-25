<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class SkillController extends Controller
{

    public function CreateSkill(Request $request){

        $validate = $request->validate([

        'name'=> [
            'required',
            'string',
            'max:255',
            // ✅ unique per user — same user can't add same skill twice
            Rule::unique('skills')->where(function ($query) {
                return $query->where('user_id', auth()->id());
            }),
        ],
        'category' => 'required|string|max:255',
        'level' => 'required|string|max:255',

        ]);

    $validate['user_id'] = auth()->id();

    $skill = Skill::create($validate);

    return redirect()->route('user.skills')->with('sucess' , 'Skill Added');

    }

    public function showSkills(){

    $skills = auth()->user()->skills;

    return view('layouts.admin.skills', compact('skills'));

    }
}