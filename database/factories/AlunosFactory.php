<?php

use Faker\Generator as Faker;

$factory->define(App\Alunos::class, function (Faker $faker) {
    return [
        'name' => 'Ederson',
        'email' => 'ederson@xpto.com',
        'senha' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'
    ];
});
