<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++){
            User::create([
                'name' => 'Usuario' . $i + 1,
                'email' => 'usuario' . $i +1 .'@example.com',
                'password' => Hash::make('12345' . $i + 1 , ['round' => 12]),
        ]);
        }

        if(!User::where('email', 'rodrigo@example.com')->first()){
            User::create([
                'name' => 'Rodrigo Moraes',
                'email' => 'rodrigo@example.com',
                'password' => Hash::make('123456', ['round' => 12]),
            ]);
        }
        
    }
}
