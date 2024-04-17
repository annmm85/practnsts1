<?php
namespace Collect;

use Collect\src\Collect;

function collection(array $array = []): Collect
{
    return new Collect($array);
}
