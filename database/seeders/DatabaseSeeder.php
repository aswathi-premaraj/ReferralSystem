<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $exist = User::where('email','admin@gmail.com')->first();
        if(!$exist){
            User::create([
                'username'     => 'Admin' ,
                'role_id'      => 1,
                'email'        => 'admin@gmail.com',
                'password'     => '12345678'
            ]);
        }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
