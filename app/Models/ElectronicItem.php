<?php

declare(strict_types=1);

namespace App\Models;

use App\Exceptions\TooManyExtrasException;
use App\Interfaces\ElectronicItemInterface;
use App\Interfaces\ExtrasInterface;

/**
 * Class ElectronicItem
 * @package App\Models
 */
abstract class ElectronicItem implements ElectronicItemInterface, ExtrasInterface
{
    public const TYPE_TELEVISION = 'television';
    public const TYPE_CONSOLE = 'console';
    public const TYPE_MICROWAVE = 'microwave';
    public const TYPE_CONTROLLER = 'controller';

    /**
     * @var ElectronicItemInterface[]
     */
    protected array $extras;

    /** @var ?int */
    protected ?int $maxExtras;

    /** @var string */
    protected string $id;

    /** @var float*/
    protected float $price;

    /**
     * @var string
     */
    protected string $type;

    /**
     * @var boolean
     */
    protected bool $wired;

    public static array $types = [
        self::TYPE_CONSOLE,
        self::TYPE_MICROWAVE,
        self::TYPE_TELEVISION,
        self::TYPE_CONTROLLER,
    ];

    /**
     * ElectronicItem constructor.
     * @param float $price
     * @param bool $wired
     */
    public function __construct(float $price, bool $wired)
    {
        $this->id = uniqid();
        $this->setType();
        $this->price = $price;
        $this->wired = $wired;
        $this->extras = [];
        $this->maxExtras();
    }

    /**
     * Set max number of extras
     */
    public function maxExtras()
    {
        $this->maxExtras = static::MAX_EXTRAS;
    }

    /**
     * @return int
     */
    public function getMaxExtras(): int
    {
        return $this->maxExtras;
    }

    /**
     * @return ElectronicItemInterface[]
     */
    public function getExtras(): array
    {
        return $this->extras;
    }

    /**
     * @param array $extras
     * @throws TooManyExtrasException
     */
    public function addExtras(array $extras)
    {
        if (!$this->canAddExtras(count($extras))) {
            throw new TooManyExtrasException();
        }
        foreach ($extras as $extra) {
            $this->addExtra($extra);
        }
    }

    /**
     * @param ElectronicItemInterface $extra
     */
    private function addExtra(ElectronicItemInterface $extra)
    {
        $this->extras[] = $extra;
    }

    /**
     * Can add next extra item
     * @param int $count
     * @return bool
     */
    public function canAddExtras(int $count): bool
    {
        return $count <= $this->maxExtras || $this->maxExtras === null;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return float
     */
    public function getTotalPrice(): float
    {
        $total = 0;

        foreach ($this->extras as $extra) {
            $total += $extra->getPrice();
        }

        return $this->price + $total;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    abstract public function setType();

    /**
     * @return bool
     */
    public function getWired(): bool
    {
        return $this->wired;
    }

    /**
     * @param bool $wired
     */
    public function setWired(bool $wired)
    {
        $this->wired = $wired;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return ucfirst($this->type) . ': ' . $this->id;
    }
}
