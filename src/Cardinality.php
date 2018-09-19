<?php declare(strict_types=1);

namespace HumanUnit;

use function HumanUnit\humanize;
use function HumanUnit\from_human;

final class Cardinality
{
    private $number;

    private const multiples = [
        'G'  => 1000 * 1000 * 1000,
        'M' => 1000 * 1000,
        'k' => 1000,
    ];

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public static function from_human(string $representation): self
    {
        return new self(from_human(self::multiples, $representation));
    }

    public static function kilo(int $number): self
    {
        return new self($number * self::multiples['k']);
    }

    public function humanize(): string
    {
        return humanize(self::multiples, $this->number);
    }

    public function to_unit(string $unit): float
    {
        return floatval($this->number / self::multiples[$unit]);
    }

    public function diff(self $other): self
    {
        return new self($this->number - $other->number);
    }
}
