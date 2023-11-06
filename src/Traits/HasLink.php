<?php

namespace Laratree\LaravelLink\Traits;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Laratree\LaravelLink\Models\Link;

trait HasLink
{
    use HasRelationships;

    public function link(): MorphOne
    {
        return $this->morphOne(
            Link::class,
            'linkable',
            'linkable_type'
        );
    }

    public function attachLink(string $value)
    {
        $data = [
            'linkable_type' => get_class($this),
            'linkable_id' => $this->getKey(),
            'url' => $value,
        ];

        return $this->link()->create($data);
    }

    public function getLink(): MorphOne
    {
        return $this->link()
            ->where('linkable_id', $this->getKey())
            ->where('linkable_type', get_class($this));
    }

    public function hasLink(string $value)
    {
        return $this->getLink()
            ->where('url', $value)
            ->exists();
    }

    /**
    public function deleteLink()
    {
        $links = $this->getLink()->get();

        foreach ($links as $link){
            $link->delete();
        }

        return $this;
    }
     */
    public function deleteLink(string $url)
    {
        return $this->getLink()
            ->where('url', $url)
            ->delete();
    }
}
