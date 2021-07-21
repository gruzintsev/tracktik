<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Class Microwave
 * @package App\Models
 */
class Microwave extends ElectronicItem
{
    public const MAX_EXTRAS = 0;

    public function setType()
    {
        $this->type = self::TYPE_MICROWAVE;
    }
}
