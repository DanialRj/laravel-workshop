<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UseUuid;

class Good extends Model
{
    use SoftDeletes, UseUuid;

    protected $fillable = [
        'name', 'description', 'slug', 'stock', 'category_id', 'owner_user_id'
    ];
}
