<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('consults')->truncate();
        DB::table('blogs')->truncate();



        factory(App\User::class,10)->create();
        factory(App\Role::class,4)->create();
        factory(App\Consult::class,10)->create();
        factory(App\Blog::class,10)->create();
        factory(App\Category::class,5)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
