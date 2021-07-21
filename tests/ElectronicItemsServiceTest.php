<?php

namespace Tests;

use App\Factories\ElectronicItemFactory;
use App\Services\ElectronicItemsService;
use PHPUnit\Framework\TestCase;

class ElectronicItemsServiceTest extends TestCase
{
    private array $items;

    private string $consoleId;

    protected function setUp(): void
    {
        $factory = new ElectronicItemFactory();
        $controllerWired1  = $factory->createController(50, true);
        $controllerWired2  = $factory->createController(50, true);
        $controllerRemote1 = $factory->createController(100);
        $controllerRemote2 = $factory->createController(100);
        $controllerRemote3 = $factory->createController(200);
        $controllerRemote4 = $factory->createController(250);
        $controllerRemote5 = $factory->createController(150);

        $console     = $factory->createConsole(1000);
        $television1 = $factory->createTelevision(1500);
        $television2 = $factory->createTelevision(2000);
        $microwave   = $factory->createTelevision(2500);

        $console->addExtras([
            $controllerWired1,
            $controllerWired2,
            $controllerRemote1,
            $controllerRemote2
        ]);

        $television1->addExtras([
            $controllerRemote3,
            $controllerRemote4
        ]);

        $television2->addExtras([$controllerRemote5]);

        $items = [
            $television1,
            $console,
            $microwave,
            $television2,
        ];

        $this->items = $items;
        $this->consoleId = $console->getId();
    }

    public function testTotalPrice()
    {
        $service = new ElectronicItemsService($this->items);
        $service->sortItems();

        $this->assertEquals(7900, $service->getTotalPrice());
    }

    public function testGetPriceById()
    {
        $service = new ElectronicItemsService($this->items);
        $service->sortItems();

        $this->assertEquals(1300, $service->getPriceById($this->consoleId));
    }
}
