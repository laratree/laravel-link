<?php

namespace Laratree\LaravelLink\Tests\SetUp\Models;

use Illuminate\Database\Eloquent\Model;
use Laratree\LaravelLink\Traits\HasLink;

class Manufacturer extends Model
{
    use HasLink;

    protected $table = 'manufacturers';

    protected $fillable = [
        'name'
    ];
}