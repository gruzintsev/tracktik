<?php

declare(strict_types=1);

namespace App\Factories;

use App\Interfaces\ElectronicItemInterface;
use App\Models\Console;
use App\Models\Controller;
use App\Models\Microwave;
use App\Models\Television;

class ElectronicItemFactory
{

    /**
     * @param float $price
     * @param bool $wired
     * @return ElectronicItemInterface
     */
    public function createConsole(float $price, bool $wired = false): ElectronicItemInterface
    {
        return new Console($price, $wired);
    }

    /**
     * @param float $price
     * @param bool $wired
     * @return ElectronicItemInterface
     */
    public function createTelevision(float $price, bool $wired = false): ElectronicItemInterface
    {
        return new Television($price, $wired);
    }

    /**
     * @param float $price
     * @param bool $wired
     * @return ElectronicItemInterface
     */
    public function createMicrowave(float $price, bool $wired = false): ElectronicItemInterface
    {
        return new Microwave($price, $wired);
    }

    /**
     * @param float $price
     * @param bool $wired
     * @return ElectronicItemInterface
     */
    public function createController(float $price, bool $wired = false): ElectronicItemInterface
    {
        return new Controller($price, $wired);
    }
}
