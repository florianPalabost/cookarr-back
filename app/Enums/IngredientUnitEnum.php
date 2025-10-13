<?php

declare(strict_types=1);

namespace App\Enums;

use App\Traits\WithValuesHelper;

enum IngredientUnitEnum: string
{
    use WithValuesHelper;

    public function label(): string
    {
        return match ($this) {
            self::GRAM       => 'Gram',
            self::KILOGRAM   => 'Kilogram',
            self::MILLILITER => 'Milliliter',
            self::LITER      => 'Liter',
            self::CUP        => 'Cup',
            self::TABLESPOON => 'Tablespoon',
            self::TEASPOON   => 'Teaspoon',
            self::PIECE      => 'Piece',
            self::SLICE      => 'Slice',
            self::PINCH      => 'Pinch',
            self::DASH       => 'Dash',
        };
    }

    case GRAM = 'g';
    case KILOGRAM = 'kg';
    case MILLILITER = 'ml';
    case LITER = 'l';
    case CUP = 'cup';
    case TABLESPOON = 'tbsp';
    case TEASPOON = 'tsp';
    case PIECE = 'piece';
    case SLICE = 'slice';
    case PINCH = 'pinch';
    case DASH = 'dash';
}
