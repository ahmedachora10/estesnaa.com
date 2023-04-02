<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::factory(3)->create();

        $roles = Role::all();

        User::all()->each(function ($user, $index) use($roles)
        {
            if($index > 3) return null;
            $user->attachRole($roles[$index]->name);
        });
    }
}