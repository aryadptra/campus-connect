<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversityStudyProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Study programs data
        $study_programs = [
            [
                'name' => 'Akuntansi',
                'slug' => 'akuntansi',
                'faculty_id' => 1
            ],
            [
                'name' => 'Manajemen',
                'slug' => 'manajemen',
                'faculty_id' => 1
            ],
            [
                'name' => 'Ekonomi Pembangunan',
                'slug' => 'ekonomi-pembangunan',
                'faculty_id' => 1
            ],
            [
                'name' => 'Ilmu Ekonomi dan Studi Pembangunan',
                'slug' => 'ilmu-ekonomi-dan-studi-pembangunan',
                'faculty_id' => 1
            ],
            [
                'name' => 'Akuntansi Syariah',
                'slug' => 'akuntansi-syariah',
                'faculty_id' => 1
            ],
            [
                'name' => 'Manajemen Syariah',
                'slug' => 'manajemen-syariah',
                'faculty_id' => 1
            ],
            [
                'name' => 'Ilmu Ekonomi dan Bisnis Islam',
                'slug' => 'ilmu-ekonomi-dan-bisnis-islam',
                'faculty_id' => 1
            ],
            [
                'name' => 'Ilmu Ekonomi dan Studi Islam',
                'slug' => 'ilmu-ekonomi-dan-studi-islam',
                'faculty_id' => 1
            ],
            [
                'name' => 'Ilmu Ekonomi dan Keuangan Islam',
                'slug' => 'ilmu-ekonomi-dan-keuangan-islam',
                'faculty_id' => 1
            ],
            [
                'name' => 'Ilmu Ekonomi Islam',
                'slug' => 'ilmu-ekonomi-islam',
                'faculty_id' => 1
            ],
            [
                'name' => 'Ilmu Ekonomi Islam dan Bisnis',
                'slug' => 'ilmu-ekonomi-islam-dan-bisnis',
                'faculty_id' => 1
            ]
        ];

        // Insert data to database
        \DB::table('university_study_programs')->insert($study_programs);
    }
}
