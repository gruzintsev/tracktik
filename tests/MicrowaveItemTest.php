<?php

namespace Tests;

use App\Exceptions\TooManyExtrasException;
use App\Factories\ElectronicItemFactory;
use PHPUnit\Framework\TestCase;

class MicrowaveItemTest extends TestCase
{
    public function testShouldNotAcceptExtras()
    {
        $this->expectException(TooManyExtrasException::class);
        $factory = new ElectronicItemFactory();
        $microwave = $factory->createMicrowave(10);
        $controller1 = $factory->createController(10);
        $microwave->addExtras([$controller1]);
    }
}
