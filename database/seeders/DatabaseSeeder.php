<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(1)->create();    
        
        DB::table('users')->insert([
            'email' => 'firetrackCapstone@gmail.com',
            'fname' => 'admin',
            'lname' => 'admin',
            'contact_no' => '12345678',
            'password' => 'admin123',
            'birthday' => '04082000',
            'gender' => 'male',
            'address' => 'Cebu City, Philippines',
            'img_url' => null,
            'role' => 'admin',
            'status' => 'active',
        ]);
    }
}
