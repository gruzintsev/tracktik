<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Factories\ElectronicItemFactory;
use App\Services\ElectronicItemsService;

function dd($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die;
}

try {
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
    $microwave   = $factory->createMicrowave(2500);

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

    $service = new ElectronicItemsService($items);
    $service->sortItems();


    echo '<h3>Question 1</h3><br/>';
    echo 'Sorted items<br/>';
    foreach ($service->getItems() as $sortedItem) {
        echo $sortedItem . ' - ' . $service->getItemPrice($sortedItem->getId());
        echo '<br>';
    }
    echo '<br>';
    echo 'Total price: ' . $service->getTotalPrice();
    echo '<br>';
    echo '<h3>Question 2</h3><br/>';
    echo $console . ' price: ' . $service->getPriceById($console->getId());
}
catch (Exception $exception)
{
    echo $exception->getMessage();
}
