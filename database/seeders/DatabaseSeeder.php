<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
          'name' => 'Administrador',
          'email' => 'admin@gmail.com',
          'password'=> Hash::make('mochica'),
          'profile_photo_path'=> 'default-photo.png',
          'Role' => 'Administrador',
        ]);
        //\App\Models\User::factory(1)->create();
    }
}
