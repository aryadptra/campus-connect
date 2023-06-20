<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversityFacultiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create data
        $university_faculties = [
            [
                'name' => 'Fakultas Ekonomika dan Bisnis',
                'slug' => 'fakultas-ekonomika-dan-bisnis',
                'university_id' => 1
            ],
            [
                'name' => 'Fakultas Kedokteran',
                'slug' => 'fakultas-kedokteran',
                'university_id' => 1
            ],
            [
                'name' => 'Fakultas Kedokteran Gigi',
                'slug' => 'fakultas-kedokteran-gigi',
                'university_id' => 1
            ],
            [
                'name' => 'Fakultas Kedokteran Hewan',
                'slug' => 'fakultas-kedokteran-hewan',
                'university_id' => 1
            ],
            [
                'name' => 'Fakultas Kehutanan',
                'slug' => 'fakultas-kehutanan',
                'university_id' => 1
            ],
            [
                'name' => 'Fakultas MIPA',
                'slug' => 'fakultas-mipa',
                'university_id' => 1
            ],
            [
                'name' => 'Fakultas Pertanian',
                'slug' => 'fakultas-pertanian',
                'university_id' => 1
            ],
            [
                'name' => 'Fakultas Peternakan',
                'slug' => 'fakultas-peternakan',
                'university_id' => 1
            ],
            [
                'name' => 'Fakultas Psikologi',
                'slug' => 'fakultas-psikologi',
                'university_id' => 1
            ],
            [
                'name' => 'Fakultas Teknik',
                'slug' => 'fakultas-teknik',
                'university_id' => 1
            ],
            [
                'name' => 'Fakultas Teknologi Pertanian',
                'slug' => 'fakultas-teknologi-pertanian',
                'university_id' => 1
            ],
        ];

        // Insert data to database
        \DB::table('university_faculties')->insert($university_faculties);
    }
}
