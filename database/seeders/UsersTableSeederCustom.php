<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeederCustom extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'adminweb')->firstOrFail();

        User::create([
            'name'           => 'Admin Web',
            'email'          => 'adminweb@adminweb.com',
            'password'       => bcrypt('password'),
            'remember_token' => Str::random(60),
            'role_id'        => $role->id,
        ]);
    }
}