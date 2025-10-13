<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Recipe;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return request()->route('recipe')->user_id === auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'        => ['sometimes', 'string', 'max:255'],
            'description'  => ['sometimes', 'string', 'max:65535'],
            'instructions' => ['sometimes', 'string', 'max:65535'],
            'image'        => ['sometimes', 'string', 'max:255'],
            'prep_time'    => ['sometimes', 'numeric', 'min:0', 'max:999'],
            'cook_time'    => ['sometimes', 'numeric', 'min:0', 'max:999'],
            'servings'     => ['sometimes', 'numeric', 'min:0', 'max:999'],
            'is_public'    => ['sometimes', 'boolean'],
        ];
    }
}
