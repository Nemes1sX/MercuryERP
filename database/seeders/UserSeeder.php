<?php

namespace Database\Seeders;

use App\Models\User;
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
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('Admin12'),
                'employee' => 'IT engineer',
                'role_id' => 1,
            ],
            [
                'name' => 'Jonas Jonaitis',
                'email' => 'jonas@mail.com',
                'password' => bcrypt('Jonas'),
                'employee' => 'IT engineer',
                'role_id' => 2,
            ],
            [
                'name' => 'Martinas',
                'email' => 'martinas@mail.com',
                'password' => bcrypt('Martinas'),
                'employee' => 'Software engineer',
            ],
            [
                'name' => 'Petras Petraitis',
                'email' => 'petras@mail.com',
                'password' => bcrypt('Petras'),
                'employee' => 'Software engineer',
            ],
            [
                'name' => 'Vardenis',
                'email' => 'vardenis@mail.com',
                'password' => bcrypt('Vardenis'),
                'employee' => 'Manager',
                'role_id' => 2,
            ],
            [
                'name' => 'Pavardenis',
                'email' => 'pavardenis@mail.com',
                'password' => bcrypt('Pavardenis'),
                'employee' => 'Manager',
                'role_id' => 2,
            ],
        ];
        foreach($users as $user){
            User::create($user);
        }
    }
}
