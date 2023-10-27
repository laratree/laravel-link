<?php

namespace Laratree\LaravelLink\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Link extends Model
{

    protected $fillable = [
        'link'
    ];

    public function linkable(): MorphTo
    {
        return $this->morphTo();
    }
}