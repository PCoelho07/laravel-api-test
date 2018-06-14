<?php

use Faker\Generator as Faker;

$factory->define(App\Produto::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->text,
        'valor_compra' => rand() % 100.0, 
        'valor_revenda' => rand() % 100.0,
        'ativo' => $faker->word,
        'imagem_url' => $faker->word
    ];
});
