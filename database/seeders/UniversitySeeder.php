<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create data
        $universities = [
            'name' => 'Universitas Gadjah Mada',
            'slug' => 'universitas-gadjah-mada',
            'village' => 'Sinduadi',
            'district' => 'Mlati',
            'city' => 'Sleman',
            'province' => 'Yogyakarta',
            'address' => 'Jl. Teknika Utara, Sinduadi, Mlati, Sleman, Yogyakarta 55281',
            'telephone' => '0274-6491961',
            'email' => 'support@ugm.ac.id',
            'website' => 'https://ugm.ac.id',
            'logo' => 'ugm.png',
            'status' => 'active'
        ];

        // Insert data to database
        \DB::table('universities')->insert($universities);
    }
}
