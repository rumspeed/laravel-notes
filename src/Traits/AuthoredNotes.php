<?php

declare(strict_types=1);

namespace Rumspeed\LaravelNotes\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Rumspeed\LaravelNotes\Models\Note;

/**
 * Trait     AuthoredNotes
 *
 * @property  \Illuminate\Database\Eloquent\Collection  authoredNotes
 */
trait AuthoredNotes
{
    /**
     * Relation to Many notes.
     */
    public function authoredNotes(): HasMany
    {
        return $this->hasMany(config('notes.notes.model', Note::class), 'author_id');
    }
}
