<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public static function boot()
    {
        parent::boot();

        static::updating(function($document) {
            $document->adjustments()->attach(Auth::id(), [
                'before' => $document->fresh()->toJson(),
                'after' => json_encode($document->getDirty())
            ]);
        });
    }

    public function adjustments()
    {
        return $this->belongsToMany(User::class, 'adjustments')
                    ->withPivot(['before', 'after'])
                    ->withTimestamps()
                    ->latest('pivot_updated_at');
    }
}
