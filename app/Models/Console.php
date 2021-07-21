<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Class Console
 * @package App\Models
 */
class Console extends ElectronicItem
{
    public const MAX_EXTRAS = 4;

    public function setType()
    {
        $this->type = self::TYPE_CONSOLE;
    }
}
