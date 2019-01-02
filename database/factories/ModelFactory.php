<?php

use Faker\Generator as Faker;

/*
$factory->define(Model::class, function (Faker $faker) {
    return [
        //
    ];
});
*/

// 创建用户的工厂

$factory->define(App\User::class, function (Faker $faker) {
    $faker = Faker\Factory::create('zh_CN');
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        "tel"=>$faker->phoneNumber(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});


// 创建场馆的工厂
$factory->define(App\Venue::class, function (Faker $faker) {

    // 球类的实例对象
    $type = \App\Type::inRandomOrder()->first();

    return [

        "type_id"=>$type->id,
        'name' => $faker->sentence(5),
        "address"=>$faker->address,
        "pics"=>"img01.jpg,img02.jpg,img03.jpg",
        "num"=>rand(1,10),
        "des"=>$faker->text,
        'state' => 1,
    ];


});


