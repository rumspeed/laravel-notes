<?php

declare(strict_types=1);

namespace Rumspeed\LaravelNotes\Traits;

use Rumspeed\LaravelNotes\Models\Note;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Trait     AuthoredNotes
 *
 * @property  \Illuminate\Database\Eloquent\Collection  authoredNotes
 */
trait AuthoredNotes
{
    /**
     * Relation to Many notes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function authoredNotes(): HasMany
    {
        return $this->hasMany(config('notes.notes.model', Note::class), 'author_id');
    }
}