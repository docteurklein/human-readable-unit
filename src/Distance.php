<?php declare(strict_types=1);

namespace HumanUnit;

use function HumanUnit\humanize;
use function HumanUnit\from_human;

final class Distance
{
    private $nano_meters;

    private const multiples = [
        'km' => 1000 * 1000 * 1000 * 1000,
        'm'  => 1000 * 1000 * 1000,
        'mm' => 1000 * 1000,
        'µm' => 1000,
        'nm' => 1,
    ];

    private function __construct(int $nano_meters)
    {
        $this->nano_meters = $nano_meters;
    }

    public static function from_human(string $representation): self
    {
        return new self(from_human(self::multiples, $representation));
    }

    public static function nano_meters(int $nano_meters)
    {
        return new self($nano_meters);
    }

    public static function meters(int $meters)
    {
        return new self($meters * self::multiples['m']);
    }

    public function humanize(): string
    {
        return humanize(self::multiples, $this->nano_meters);
    }

    public function to_unit(string $unit): float
    {
        return floatval($this->nano_meters / self::multiples[$unit]);
    }
}
