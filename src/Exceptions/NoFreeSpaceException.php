<?php

namespace App\Exceptions;

class NoFreeSpaceException extends \Exception
{
    protected $message = "Sorry, no place left";
}