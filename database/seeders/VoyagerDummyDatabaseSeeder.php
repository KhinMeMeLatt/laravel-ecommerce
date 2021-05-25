<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VoyagerDummyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(TranslationsTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
    }
}
