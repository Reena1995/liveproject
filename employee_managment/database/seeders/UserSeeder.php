<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([            
            
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'uuid' => \Str::uuid(),
            'password' =>\Hash::make('admin@gmail.com'),
            'onboarding_dtls' => '0',
            'role_id' =>'1',
            'created_by' => '1',
            'is_active' =>'1',
        ]);
       
    }
}
