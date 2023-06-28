<?php

namespace App\Exceptions;

use InvalidArgumentException;

class LicensePlatShouldNotEmpty extends InvalidArgumentException
{
    protected $message = 'License plate cannot be empty.';
}