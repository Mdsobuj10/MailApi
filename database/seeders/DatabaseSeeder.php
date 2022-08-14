<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\post;
use App\Models\staff;
use Database\Factories\postFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
 
        post::factory(100) ->create();

    //   staff::create([
    //     'name' => 'md sobuj mia',
    //     'email' => 'mdsobuj@gmail.com',
    //     'cell' => '01785655545',
    //     'username' => 'md sobuj',
    //   ]);
      
    //   staff::create([
    //     'name' => 'md sobuj mia',
    //     'email' => 'mdsobuj1@gmail.com',
    //     'cell' => '01785655545',
    //     'username' => 'md sobuj',
    //   ]);
      
    //   staff::create([
    //     'name' => 'md sobuj mia',
    //     'email' => 'mdsobuj2@gmail.com',
    //     'cell' => '01785655545',
    //     'username' => 'md sobuj',
    //   ]);




    }
}
