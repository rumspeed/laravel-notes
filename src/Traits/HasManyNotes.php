<?php

declare(strict_types=1);

namespace Rumspeed\LaravelNotes\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Class     HasManyNotes
 *
 * @property  \Illuminate\Database\Eloquent\Collection  notes
 */
trait HasManyNotes
{
    /**
     * The notes relationship.
     */
    public function notes(): MorphMany
    {
        return $this->morphMany((string) config('notes.notes.model'), 'noteable');
    }

    /**
     * Create a note.
     *
     * @param  string  $content
     * @param  \Illuminate\Database\Eloquent\Model|null  $author
     * @param  bool  $reload
     * @return \Rumspeed\LaravelNotes\Models\Note
     */
    public function createNote($content, $author = null, $reload = true)
    {
        /** @var \Rumspeed\LaravelNotes\Models\Note $note */
        $note = $this->notes()->create(
            $this->prepareNoteAttributes($content, $author)
        );

        if ($reload) {
            $relations = array_merge(
                ['notes'],
                method_exists($this, 'authoredNotes') ? ['authoredNotes'] : []
            );

            $this->load($relations);
        }

        return $note;
    }

    /**
     * Retrieve a note by its ID.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findNote($id)
    {
        return $this->notes()->find($id);
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Prepare note attributes.
     *
     * @param  string  $content
     * @return array
     */
    protected function prepareNoteAttributes($content, Model $author = null)
    {
        return [
            'author_id' => is_null($author) ? $this->getCurrentAuthorId() : $author->getKey(),
            'content' => $content,
        ];
    }

    /**
     * Get the current author's id.
     *
     * @return int|null
     */
    protected function getCurrentAuthorId()
    {
        return null;
    }
}
