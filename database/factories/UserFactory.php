<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Consult;
use App\Blog;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [


        'role_id'   =>  $faker->numberBetween(1,4),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'api_token' => Str::random(10),
        'remember_token' => Str::random(10),
         'photo_id' => $faker->numberBetween(1,4),
//        'verify_code' => $faker->numberBetween(1000,2000),
//        'mobile' => $faker->unique()->numberBetween(012345,0234455),
         'block'  =>$faker->numberBetween(0,1),
    ];
});



$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Admin','User','Customer']),
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['consult1','consult2','consult3','consult4','consult5']),
    ];
});




$factory->define(Consult::class, function (Faker $faker) {
    return [
        'category_id'   =>  $faker->numberBetween(1,4),
        'question' => $faker->title,
        'content' => $faker->paragraph,
        'price'   => $faker->numberBetween(100.5,100),
    ];
});


$factory->define(Blog::class, function (Faker $faker) {
    return [


        'category_id'   =>  $faker->numberBetween(1,4),
        'blogger' => $faker->name,
        'title' => $faker->title,
        'content' => $faker->paragraph,
        'tag'     => $faker->name,
        'photo_id' => $faker->numberBetween(1,4),

    ];
});