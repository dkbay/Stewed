<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipe;
use App\Recipe;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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
    return Recipe::with('steps', 'ingredients')->get();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param StoreRecipe $request
   * @return Exception|int
   */
  public function store(StoreRecipe $request)
  {
    try {
      $recipe = auth()->user()->recipes()->create([
        'title' => $request->title,
        'description' => $request->description
      ]);

      $recipe->ingredients()->create([
        'description' => $request->ingredients
      ]);

      $recipe->steps()->create([
        'description' => $request->steps
      ]);

      return Response::HTTP_OK;
    } catch (Exception $exception) {
      return $exception;
    }
  }

  /**
   * Display the specified resource.
   *
   * @param Recipe $recipe
   * @return Recipe|Recipe[]|Collection|Model
   */
  public function show(Recipe $recipe)
  {
    return $recipe->load(['ingredients', 'steps']);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param StoreRecipe $request
   * @param Recipe $recipe
   * @return int
   */
  public function update(StoreRecipe $request,Recipe $recipe)
  {
    $userId = $request->user()->id;
    if ($userId == $recipe->user->id) {
      $recipe->update([
        'title' => $request->title,
        'description' => $request->description
      ]);

      $recipe->ingredients()->update([
        'description' => $request->ingredients
      ]);

      $recipe->steps()->update([
        'description' => $request->steps
      ]);

      return Response::HTTP_OK;
    }

    return Response::HTTP_BAD_REQUEST;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Recipe $recipe
   * @return int
   * @throws Exception
   */
  public function destroy(Recipe $recipe)
  {
    $userId = auth()->user()->id;

    if ($userId == $recipe->user->id) {
      $recipe->delete();
      return Response::HTTP_OK;
    }

    return Response::HTTP_BAD_REQUEST;
  }
}
