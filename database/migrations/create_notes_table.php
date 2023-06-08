<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(config('notes.notes.table', 'notes'), function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->morphs('noteable');
            $table->unsignedBigInteger('author_id')->nullable();
            $table->timestamps();

            $table->foreign('author_id')
                ->references('id')
                ->on((string) config('notes.authors.table', 'users'))
                ->onDelete('cascade');
        });
    }
};
