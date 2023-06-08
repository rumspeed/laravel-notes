<?php

declare(strict_types=1);

namespace Rumspeed\LaravelNotes\Tests\Stubs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class     UserWithAuthorId
 */
class UserWithAuthorId extends User
{
    use HasFactory;

    /**
     * Get the current author's id.
     *
     * @return mixed
     */
    protected function getCurrentAuthorId()
    {
        return $this->getKey();
    }
}
