<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreRecipe extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return Auth::check();
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'title' => 'required|max:255',
      'description' => 'required|max:255',
      'ingredients' => 'required|max:65535',
      'steps' => 'required|max:65535'
    ];
  }

  /**
   * Get the error messages for the defined validation rules.
   *
   * @return array
   */
  public function messages()
  {
    return [
      'title.required' => 'A title is required',
      'title.max' => 'The title is too long',
      'description.required' => 'A description is required',
      'description.max' => 'The description is too long',
      'ingredients.required' => 'Ingredients is required',
      'ingredients.max' => 'The ingredients are too long',
      'steps.required' => 'Steps are required',
      'steps.max' => 'The steps are too long',
    ];
  }
}
