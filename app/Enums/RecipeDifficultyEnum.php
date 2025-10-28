<?php

declare(strict_types=1);

namespace App\Enums;

use App\Traits\WithValuesHelper;

enum RecipeDifficultyEnum: string
{
    use WithValuesHelper;

    public function label(): string
    {
        return ucfirst($this->value);
    }

    case EASY = 'easy';
    case MEDIUM = 'medium';
    case HARD = 'hard';
}
