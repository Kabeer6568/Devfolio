<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    // protected $table = 'projects';
    protected $fillable = [

    'user_id',
    'title',
    'description',
    'github_link',
    'live_link',
    'tags',
    'status',

    ];

    public function user(){

    return $this->belongsTo(User::class);

    }
}
