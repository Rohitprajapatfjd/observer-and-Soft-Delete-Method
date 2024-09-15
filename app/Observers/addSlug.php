<?php

namespace App\Observers;

use App\Models\author;
use Str;

class addSlug
{
    /**
     * Handle the author "created" event.
     */
    public function creating(author $author): void
    {
        $author->slug = Str::slug($author->name);
    }

   

    /**
     * Handle the author "updated" event.
     */
    public function updated(author $author): void
    {
        //
    }

    /**
     * Handle the author "deleted" event.
     */
    public function deleting(author $author): void
    {
        $author->books()->delete();
    }

    /**
     * Handle the author "restored" event.
     */
    public function restored(author $author): void
    {
        //
    }

    /**
     * Handle the author "force deleted" event.
     */
    public function forceDeleted(author $author): void
    {
        //
    }
}
