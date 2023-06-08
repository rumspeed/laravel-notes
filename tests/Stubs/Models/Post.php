<?php

declare(strict_types=1);

namespace Rumspeed\LaravelNotes\Tests\Stubs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rumspeed\LaravelNotes\Traits\HasOneNote;

/**
 * Class     Post
 *
 * @property  int     id
 * @property  string  title
 * @property  string  content
 */
class Post extends Model
{
    /* -----------------------------------------------------------------
     |  Traits
     | -----------------------------------------------------------------
     */

    use HasFactory;
    use HasOneNote;

    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content'];
}
