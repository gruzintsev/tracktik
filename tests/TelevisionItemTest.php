<?php

namespace Tests;

use App\Factories\ElectronicItemFactory;
use PHPUnit\Framework\TestCase;

class TelevisionItemTest extends TestCase
{
    public function testShouldAcceptAnyNumberExtras()
    {
        $factory = new ElectronicItemFactory();
        $tv = $factory->createTelevision(10);
        $extras = [];
        foreach (range(0, 100) as $i) {
            $extras[] = $factory->createController(10);
        }
        $tv->addExtras($extras);
        $this->assertCount(count($extras), $tv->getExtras());
    }
}
