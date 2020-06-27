<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Ingredient
 *
 * @property-read \App\Recipe $Recipe
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ingredient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ingredient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ingredient query()
 * @mixin \Eloquent
 */
class Ingredient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'description'
    ];

    /**
     * Get the recipe for this ingredient
     */
    public function Recipe() {
      return $this->belongsTo('App\Recipe');
    }
}
