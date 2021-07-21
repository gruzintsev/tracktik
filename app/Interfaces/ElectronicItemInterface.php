<?php

declare(strict_types=1);

namespace App\Interfaces;

/**
 * Interface ElectronicItemInterface
 * @package App\Interfaces
 */
interface ElectronicItemInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return float
     */
    public function getPrice(): float;

    /**
     * @return float
     */
    public function getTotalPrice(): float;
}
