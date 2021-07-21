<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Class Controller
 * @package App\Models
 */
class Controller extends ElectronicItem
{
    public const MAX_EXTRAS = 0;

    public function setType()
    {
        $this->type = self::TYPE_CONTROLLER;
    }
}
