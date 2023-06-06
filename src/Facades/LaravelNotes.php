<?php

namespace Rumspeed\LaravelNotes\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rumspeed\LaravelNotes\LaravelNotes
 */
class LaravelNotes extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Rumspeed\LaravelNotes\LaravelNotes::class;
    }
}
