<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Step
 *
 * @property-read \App\Recipe $Recipe
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step query()
 * @mixin \Eloquent
 */
class Step extends Model
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
     * Get the recipe for this step
     */
    public function Recipe() {
      return $this->belongsTo(Recipe::class, 'recipe_id');
    }
}
