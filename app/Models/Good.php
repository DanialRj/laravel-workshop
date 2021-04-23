<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Multitenantable;
use App\Traits\UseUuid;

class Good extends Model
{
    use SoftDeletes, UseUuid, Multitenantable;

    protected $fillable = [
        'name', 'description', 'slug', 'stock', 'category_id', 'owner_user_id'
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
