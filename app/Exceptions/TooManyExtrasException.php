<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

/**
 * Class TooManyExtrasException
 * @package App\Exceptions
 */
class TooManyExtrasException extends Exception
{
    /**
     * TooManyExtrasException constructor.
     */
    public function __construct()
    {
        parent::__construct('An attempt to add extras larger than the maximum');
    }
}
