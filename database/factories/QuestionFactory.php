<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Question;
use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        //
        'body' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),

    ];
});
