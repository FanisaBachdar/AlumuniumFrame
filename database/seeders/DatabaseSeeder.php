<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            
            'name' => 'Fanisa A Bachdar',
            'username' => 'fanisabachdar',
            'email' => 'fanisa@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::factory(2)->create();

        Post::factory(20)->create();


        
    }
}
