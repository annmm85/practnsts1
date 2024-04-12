<?php

namespace Validators;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Validator\AbstractValidator;

class NumberValidator extends AbstractValidator
{

    protected string $message = 'В :field должны быть буквы';

    public function rule(): bool
    {
        return !ctype_digit($this->value);
    }
}
