<?php

namespace Tests;

use App\Factories\ElectronicItemFactory;
use App\Models\Console;
use App\Models\Controller;
use App\Models\Microwave;
use App\Models\Television;
use PHPUnit\Framework\TestCase;

class ElectronicItemFactoryTest extends TestCase
{
    public function testShouldCreateConsole()
    {
        $factory = new ElectronicItemFactory();
        $console = $factory->createConsole(10);

        $this->assertInstanceOf(Console::class, $console);
    }

    public function testShouldCreateTelevision()
    {
        $factory = new ElectronicItemFactory();
        $console = $factory->createTelevision(10);

        $this->assertInstanceOf(Television::class, $console);
    }

    public function testShouldCreateMicrowave()
    {
        $factory = new ElectronicItemFactory();
        $console = $factory->createMicrowave(10);

        $this->assertInstanceOf(Microwave::class, $console);
    }

    public function testShouldCreateController()
    {
        $factory = new ElectronicItemFactory();
        $console = $factory->createController(10);

        $this->assertInstanceOf(Controller::class, $console);
    }
}
