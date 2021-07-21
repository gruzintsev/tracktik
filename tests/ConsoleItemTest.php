<?php

namespace Tests;

use App\Exceptions\TooManyExtrasException;
use App\Factories\ElectronicItemFactory;
use PHPUnit\Framework\TestCase;

class ConsoleItemTest extends TestCase
{
    public function testAcceptLessExtrasThanMax()
    {
        $factory = new ElectronicItemFactory();
        $console = $factory->createConsole(10);
        $controller1 = $factory->createController(10);
        $controller2 = $factory->createController(10);
        $controller3 = $factory->createController(10);
        $controller4 = $factory->createController(10);

        $console->addExtras([
            $controller1,
            $controller2,
            $controller3,
            $controller4,
        ]);

        $this->assertCount(4, $console->getExtras());
    }

    public function testDoesNotAcceptMoreExtrasThanMax()
    {
        $this->expectException(TooManyExtrasException::class);
        $factory = new ElectronicItemFactory();
        $console = $factory->createConsole(10);
        $controller1 = $factory->createController(10);
        $controller2 = $factory->createController(10);
        $controller3 = $factory->createController(10);
        $controller4 = $factory->createController(10);
        $controller5 = $factory->createController(10);

        $console->addExtras([
            $controller1,
            $controller2,
            $controller3,
            $controller4,
            $controller5,
        ]);
    }
}
