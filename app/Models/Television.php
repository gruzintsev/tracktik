<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Class Television
 * @package App\Models
 */
class Television extends ElectronicItem
{
    public const MAX_EXTRAS = null;

    public function setType()
    {
        $this->type = self::TYPE_TELEVISION;
    }
}
