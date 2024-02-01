<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$6pFFBA//IIn8zwHdH3t3JOs.rD3S/0zAzQvZbIcVTrF1bDT6OemFe',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
