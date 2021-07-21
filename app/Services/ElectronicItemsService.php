<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\ElectronicItemInterface;
use App\Models\ElectronicItem;

/**
 * Class ElectronicItemsService
 * @package App\Services
 */
class ElectronicItemsService
{
    public const SORT_ASC = 'asc';
    public const SORT_DESC = 'desc';

    /** @var ElectronicItemInterface[] */
    private array $items;

    /** @var float */
    private float $total;

    /** @var array */
    private array $priceMap;

    /**
     * ElectronicItemsService constructor.
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return ElectronicItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return float
     */
    public function getTotalPrice(): float
    {
        return $this->total;
    }

    /**
     * @param string $id
     * @return float
     */
    public function getItemPrice(string $id): float
    {
        return $this->priceMap[$id] ?? 0;
    }

    /**
     * Sort items
     */
    public function sortItems($direction = self::SORT_ASC)
    {
        $total = 0;
        $sorted = [];

        foreach ($this->items as $item) {
            $price = $item->getPrice();
            $commonPrice = $item->getTotalPrice();
            $total += $commonPrice;
            $sorted[$price * 100] = $item;
            $this->priceMap[$item->getId()] = $commonPrice;
        }

        $this->items = $sorted;
        if ($direction == self::SORT_ASC) {
            ksort($this->items, SORT_NUMERIC);
        } else {
            krsort($this->items, SORT_NUMERIC);
        }
        $this->total = round($total, 2);
    }

    /**
     * getLastOrderPriceByType
     *
     * @param  string $id
     * @return float
     */
    public function getPriceById(string $id): float
    {
        return $this->priceMap[$id] ?? 0;
    }
}
