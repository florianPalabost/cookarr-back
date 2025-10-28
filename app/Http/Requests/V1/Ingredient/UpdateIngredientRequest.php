<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Ingredient;

use App\Enums\IngredientCategoryEnum;
use App\Enums\IngredientUnitEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateIngredientRequest extends FormRequest
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
            'name'         => ['sometimes', 'string', 'max:255', 'unique:ingredients'],
            'default_unit' => ['sometimes', 'string', 'max:255', Rule::enum(IngredientUnitEnum::class)],
            'category'     => ['sometimes', 'string', 'max:255', Rule::enum(IngredientCategoryEnum::class)],
        ];
    }
}
