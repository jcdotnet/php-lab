<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [ 
            [ 'name' => 'C#', 'category_id' => 2 ],
            [ 'name' => 'Java', 'category_id' => 2 ],
            [ 'name' => 'JavaScript', 'category_id' => 2 ],
            [ 'name' => 'TypeScript', 'category_id' => 2 ],
            [ 'name' => 'SQL', 'category_id' => 3 ],
            [ 'name' => 'Stored Procedures', 'category_id' => 3 ],
            [ 'name' => 'Transact-SQL', 'category_id' => 3 ],
            [ 'name' => 'Relational Databases', 'category_id' => 3 ],
            [ 'name' => 'Microsoft SQL Server', 'category_id' => 3 ],
            [ 'name' => 'MySQL', 'category_id' => 3 ],
            [ 'name' => 'Programming', 'category_id' => 4 ],
            [ 'name' => 'Data Structures', 'category_id' => 4 ],
            [ 'name' => 'Algorithms', 'category_id' => 4 ],
            [ 'name' => 'Object-Oriented Programing', 'category_id' => 4 ],   
            [ 'name' => 'Design Patterns', 'category_id' => 4 ],
            [ 'name' => '.NET development', 'category_id' => 5 ],
            [ 'name' => 'Build Tools', 'category_id' => 5 ],
            [ 'name' => 'Automated Testing', 'category_id' => 5 ],
            [ 'name' => 'Git', 'category_id' => 5 ],
            [ 'name' => 'GitHub', 'category_id' => 5 ],
            [ 'name' => 'HTML', 'category_id' => 6 ],
            [ 'name' => 'CSS', 'category_id' => 6 ],
            [ 'name' => 'jQuery', 'category_id' => 6 ],   
            [ 'name' => 'Web Services', 'category_id' => 6 ],
            [ 'name' => 'ASP.NET', 'category_id' => 6 ],
            [ 'name' => 'Laravel', 'category_id' => 6 ],
            [ 'name' => 'Node.js', 'category_id' => 6 ],
            [ 'name' => 'Angular', 'category_id' => 6 ],
            [ 'name' => 'React.js', 'category_id' => 6 ],
            [ 'name' => 'Next.js', 'category_id' => 6 ],
            [ 'name' => 'Windows Forms', 'category_id' => 7 ],
            [ 'name' => 'WPF', 'category_id' => 7 ],
            [ 'name' => 'Android', 'category_id' => 8 ],
            [ 'name' => 'Ionic', 'category_id' => 8 ],
            [ 'name' => 'WordPress Theme Development', 'category_id' => 9 ],
            [ 'name' => 'WordPress Plugin Development', 'category_id' => 9 ],
            [ 'name' => 'Divi Development', 'category_id' => 9 ],
            [ 'name' => 'Desktop Development', 'category_id' => 1 ],
            [ 'name' => 'Redux', 'category_id' => 1 ],
            [ 'name' => 'SOLID Principles', 'category_id' => 1 ],
            [ 'name' => 'Software Design', 'category_id' => 1 ],
            [ 'name' => 'Software Development', 'category_id' => 1 ],
            [ 'name' => 'Software Development Life Cycle', 'category_id' => 1 ], 
            [ 'name' => 'Subversion', 'category_id' => 1 ],
            [ 'name' => 'TailWind CSS', 'category_id' => 1 ],
            [ 'name' => 'Version Control', 'category_id' => 1 ],
            [ 'name' => 'Visual Studio', 'category_id' => 1 ],
            [ 'name' => 'Web Development', 'category_id' => 1 ],
            [ 'name' => 'WordPress', 'category_id' => 1 ],
        ];

        foreach ($skills as $key => $skill) {    
            DB::table('skills')->insert([
                'name' => $skill['name'],
                'category_id' => $skill['category_id'],
            ]);
        }
    }
}
