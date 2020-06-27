<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recipe;
use App\Step;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RecipeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Recipe[]|Collection
   */
  public function index()
  {
    return Recipe::all();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return Exception|int
   */
  public function store(Request $request)
  {
    try {
      $recipe = new Recipe;

      $recipe->title = $request->title;
      $recipe->description = $request->description;

      $recipeId = $recipe->save();

      $ingredient = new Ingredient;

      $ingredient->description = $request->ingredients;
      $ingredient->recipe_id = $recipeId;
      $ingredient->save();

      $step = new Step;

      $step->description = $request->steps;
      $step->recipe_id = $recipeId;
      $step->save();

      return Response::HTTP_OK;
    } catch (Exception $exception) {
      return $exception;
    }


  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return Recipe|Recipe[]|Collection|Model
   */
  public function show($id)
  {
    return Recipe::find($id);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param int $id
   * @return int
   */
  public function update(Request $request, $id)
  {
    $userId = $request->user()->id;
    $recipe = Recipe::find($id);

    if ($userId == $recipe->user()->id) {
      if ($request->has('title')) {
        $recipe->title = $request->title;
      }
      if ($request->has('description')) {
        $recipe->description = $request->description;
      }
      if ($request->has('ingredients')) {
        $recipe->ingredients()->description = $request->ingredients;
      }
      if ($request->has('steps')) {
        $recipe->steps()->description = $request->steps;
      }

      $recipe->save();
    }

    return Response::HTTP_BAD_REQUEST;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return int
   * @throws Exception
   */
  public function destroy($id)
  {
    $userId = auth()->user()->id;
    $recipe = Recipe::find($id);

    if ($userId == $recipe->user()->id) {
      $recipe->delete();
      return Response::HTTP_OK;
    }

    return Response::HTTP_BAD_REQUEST;
  }
}
