<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experience_types = [ 
            'education',
            'job',
            'project',
        ];

        foreach ($experience_types as $type) {     
            DB::table('experience_types')->insert([
                'type' => $type,
            ]);
        }
    }
}
