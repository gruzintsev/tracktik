<?php

declare(strict_types=1);

namespace App\Interfaces;

/**
 * Interface ExtrasInterface
 * @package App\Interfaces
 */
interface ExtrasInterface
{
    public function maxExtras();

    /**
     * @param int $count
     * @return bool
     */
    public function canAddExtras(int $count): bool;

    /**
     * @param array $extras
     */
    public function addExtras(array $extras);

    /**
     * @return array
     */
    public function getExtras(): array;
}
