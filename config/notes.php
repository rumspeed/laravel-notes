<?php

return [

    /* -----------------------------------------------------------------
     |  Models
     | -----------------------------------------------------------------
     */

    'authors' => [
        'table' => 'users',
        'model' => App\Models\User::class, // @phpstan-ignore-line
    ],

    'notes' => [
        'table' => 'notes',
        'model' => Rumspeed\LaravelNotes\Models\Note::class
    ],

];
