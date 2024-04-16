<?php

namespace Validators;
use Src\Validator\AbstractValidator;

class LanguageValidator extends AbstractValidator
{

    protected string $message = 'Поле :field может содержать только кириллицу';

    public function rule(): bool
    {
       return !preg_match("/[^0-9а-яёА-ЯЁ ]/u", $this->value);
    }
}
