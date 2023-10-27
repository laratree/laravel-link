<?php

namespace Laratree\LaravelLink\Traits;

use Laratree\LaravelLink\Models\Link;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasLink {

    public function link(): MorphOne
    {
        return $this->morphOne(Link::class, 'linkable');
    }
}