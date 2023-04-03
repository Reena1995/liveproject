<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use Faker\Factory as Faker;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=100; $i++) 
        {
            $faker = Faker::create();
            $department = new Department;
            $department->name = $faker->name;
            $department->save();
        }
      
    }
}
