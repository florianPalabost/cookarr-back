<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Recipe;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return ValidationRules
     */
    public function rules(): array
    {
        return [
            'title'          => ['required', 'string', 'max:255'],
            'description'    => ['sometimes', 'string', 'max:255'],
            'instructions'   => ['sometimes', 'array', 'min:1'],
            'instructions.*' => ['required', 'string'],
            'image'          => ['sometimes', 'string', 'max:255'],
            'prep_time'      => ['sometimes', 'numeric', 'min:0', 'max:999'],
            'cook_time'      => ['sometimes', 'numeric', 'min:0', 'max:999'],
            'servings'       => ['sometimes', 'numeric', 'min:0', 'max:999'],
            'is_public'      => ['sometimes', 'boolean'],

            'ingredients'    => ['required', 'array', 'min:1'],
            'ingredients.*'  => ['required', 'string'],
            // 'difficulty'   => ['sometimes', 'string', 'max:255', Rule::enum(RecipeDifficultyEnum::class)],
        ];
    }
}
