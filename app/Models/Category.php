<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UseUuid;

class Category extends Model
{
    use SoftDeletes, UseUuid;

    protected $fillable = [
        'name', 'slug',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = [
        'deleted_at',
    ];
}
