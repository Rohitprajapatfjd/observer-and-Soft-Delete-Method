<?php

namespace App\Observers;

use App\Models\form;

class formObserver
{
    /**
     * Handle the form "created" event.
     */
    public function created(form $form): void
    {
        //
    }

    /**
     * Handle the form "updated" event.
     */
    public function updated(form $form): void
    {
        //
    }

    /**
     * Handle the form "deleted" event.
     */
    public function deleted(form $form): void
    {
        //
    }

    /**
     * Handle the form "restored" event.
     */
    public function restored(form $form): void
    {
        //
    }

    /**
     * Handle the form "force deleted" event.
     */
    public function forceDeleted(form $form): void
    {
        $path = public_path('storage/') . $form->image_path;
        if (file_exists($path)) {
            @unlink($path);
    }
}
}
