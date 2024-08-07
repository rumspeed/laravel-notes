<?php

declare(strict_types=1);

namespace Rumspeed\LaravelNotes\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class     Note
 *
 * @property int $id
 * @property string $content
 * @property int $noteable_id
 * @property string $noteable_type
 * @property int $author_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Illuminate\Database\Eloquent\Model $author
 * @property \Illuminate\Database\Eloquent\Model $noteable
 */
class Note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'author_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'noteable_id',
        'noteable_type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'noteable_id' => 'integer',
        'author_id' => 'integer',
    ];

    /**
     * Note constructor.
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('notes.notes.table', 'notes'));
    }

    /* -----------------------------------------------------------------
     |  Relationship
     | -----------------------------------------------------------------
     */

    /**
     * The noteable relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function noteable()
    {
        return $this->morphTo();
    }

    /**
     * The author relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(config('notes.authors.model'));
    }
}
