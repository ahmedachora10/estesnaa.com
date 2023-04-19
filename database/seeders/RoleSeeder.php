<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'المدير', // optional
                'description' => ' مدير الموقع له كافة الصلاحيات', // optional
            ],
            [
                'name' => 'inventor',
                'display_name' => 'المخترعين', // optional
                'description' => 'المخترعين', // optional
            ],
            [
                'name' => 'service_provider',
                'display_name' => 'مقدمي الخدمات', // optional
                'description' => 'مقدمي الخدمات', // optional
            ],
            [
                'name' => 'event',
                'display_name' => 'الفعاليات', // optional
                'description' => 'الفعاليات', // optional
            ],
            [
                'name' => 'user',
                'display_name' => 'المستخدمين', // optional
                'description' => 'المستخدمين', // optional
            ]

        ];

        foreach ($roles as $role) {
            if(Role::where('name', $role['name'])->first()) continue;
            Role::create($role);
        }
    }
}
