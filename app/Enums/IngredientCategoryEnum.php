<?php

declare(strict_types=1);

namespace App\Enums;

use App\Traits\WithValuesHelper;

enum IngredientCategoryEnum: string
{
    use WithValuesHelper;

    public function label(): string
    {
        return ucfirst($this->value);
    }

    case VEGETABLE = 'vegetable';
    case FRUIT = 'fruit';
    case MEAT = 'meat';
    case SEAFOOD = 'seafood';
    case DAIRY = 'dairy';
    case GRAIN = 'grain';
    case LEGUME = 'legume';
    case SPICE = 'spice';
    case OIL = 'oil';
    case SWEETENER = 'sweetener';
    case OTHER = 'other';
}
