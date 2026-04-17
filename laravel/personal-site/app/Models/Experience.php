<?php

namespace App\Models;

use App\Models\ExperienceType;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    /** @use HasFactory<\Database\Factories\ExperienceFactory> */
    use HasFactory;

    public function experience_type() {
        return $this->hasOne(ExperienceType::class);
    }
    
    public function skills() {
        return $this->belongsToMany(Skill::class);
    }
}
