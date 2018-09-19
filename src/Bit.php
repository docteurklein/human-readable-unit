<?php

namespace HumanUnit;

use function HumanUnit\from_human;
use function HumanUnit\humanize;

final class Bit
{
    private $number;

    private const multiples = [
        'TB'  => 8 * 1000 * 1000 * 1000 * 1000,
        'Tb'  => 1000 * 1000 * 1000 * 1000,
        'GB'  => 8 * 1000 * 1000 * 1000,
        'Gb'  => 1000 * 1000 * 1000,
        'MB'  => 8 * 1000 * 1000,
        'Mb'  => 1000 * 1000,
        'kB'  => 8 * 1000,
        'kb'  => 1000,
        'B'   => 8,
        'b'   => 1,
    ];

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public static function from_human(string $representation): self
    {
        return new self(from_human(self::multiples, $representation));
    }

    public static function byte(int $number): self
    {
        return new self($number * self::multiples['B']);
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
