<?php

namespace Validators;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Validator\AbstractValidator;

class DaterValidator extends AbstractValidator
{

    protected string $message = 'Поле :field может содержать только кириллицу';

    public function rule(): bool
    {
        return (strtotime($this->value) < strtotime(date('Y-m-d')));
    }
}