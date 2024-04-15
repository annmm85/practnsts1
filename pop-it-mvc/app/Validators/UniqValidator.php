<?php

namespace Validators;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Validator\AbstractValidator;

class UniqValidator extends AbstractValidator
{

    protected string $message = 'Field :field must be unique';

    public function rule(): bool
    {
        var_dump($this->args);
        //var_dump(Capsule::table($this->args[0])->where([$this->args[1]=>$this->value,$this->args[2]=>$this->value,$this->args[3]=>$this->value])->count()); die();
        //return (bool)!Capsule::table($this->args[0])->where([$this->args[1]=>$this->value,$this->args[2]=>$this->value,$this->args[3]=>$this->value])->count();
    }
}