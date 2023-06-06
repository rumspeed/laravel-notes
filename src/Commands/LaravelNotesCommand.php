<?php

namespace Rumspeed\LaravelNotes\Commands;

use Illuminate\Console\Command;

class LaravelNotesCommand extends Command
{
    public $signature = 'laravel-notes';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
