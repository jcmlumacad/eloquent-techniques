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
            $document->adjust();
        });
    }

    public function adjustments()
    {
        return $this->belongsToMany(User::class, 'adjustments')
                    ->withPivot(['before', 'after'])
                    ->withTimestamps()
                    ->latest('pivot_updated_at');
    }

    public function adjust($userId = null)
    {
        $userId = $userId ?: Auth::id();

        return $this->adjustments()->attach($userId, $this->getDiff());
    }

    protected function getDiff()
    {
        $changed = $this->getDirty();

        $before = json_encode(array_intersect_key($this->fresh()->toArray(), $changed));
        $after = json_encode($changed);

        return compact('before', 'after');
    }
}
