<?php

namespace App\Exceptions;

use Throwable;

class CarNotFoundException extends \Exception
{

    public function __construct(
        string $message,
        int $code = 0,
        ?Throwable $previous = null)
    {
        parent::__construct("Car with license plate ".$message. " Not found", $code, $previous);
    }
}