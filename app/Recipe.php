<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Recipe
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Ingredient[] $ingredients
 * @property-read int|null $ingredients_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Step[] $steps
 * @property-read int|null $steps_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe query()
 * @mixin \Eloquent
 */
class Recipe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'title', 'description',
    ];

    /**
     * Get the recipes user
     */
    public function user() {
      return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the ingredients for this recipe
     */
    public function ingredients() {
      return $this->hasMany(Ingredient::class);
    }

    /**
     * Get the steps for this recipe
     */
    public function steps() {
      return $this->hasMany(Step::class);
    }
}
