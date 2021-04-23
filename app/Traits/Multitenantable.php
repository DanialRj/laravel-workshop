<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Multitenantable {

  protected static function bootMultitenantable()
  {
    if (auth()->check()) {
      static::creating(function ($model) {
          $model->owner_user_id = auth()->id();
      });

      static::addGlobalScope('owner_user_id', function (Builder $builder) {
        $builder->where('owner_user_id', auth()->id());
      });
    }
  }

}