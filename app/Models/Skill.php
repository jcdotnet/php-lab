<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Experience;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function category() {
        return $this->hasOne(category::class);
    }
    public function experiences() {
        return $this->belongsToMany(Experience::class);
    }
}
