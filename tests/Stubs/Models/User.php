<?php

declare(strict_types=1);

namespace Rumspeed\LaravelNotes\Tests\Stubs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rumspeed\LaravelNotes\Traits\AuthoredNotes;
use Rumspeed\LaravelNotes\Traits\HasManyNotes;

/**
 * Class     User
 *
 * @property  int  id
 */
class User extends Model
{
    use AuthoredNotes;
    /* -----------------------------------------------------------------
     |  Traits
     | -----------------------------------------------------------------
     */

    use HasFactory;
    use HasManyNotes;

    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];
}
