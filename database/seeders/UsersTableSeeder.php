<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'           => 'Admin2',
            'email'          => 'admin2@neema.com',
            'identity'          => '1',
            'password'       => Hash::make('password'),
            'remember_token' => Str::random(60),
        ]);
    }
}
