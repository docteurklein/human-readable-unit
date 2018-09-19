<?php

namespace HumanUnit;

use function HumanUnit\format;
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

    public static function nano_meters(int $nano_meters)
    {
        return new self($nano_meters);
    }

    public function format(): string
    {
        return format(self::multiples, $this->nano_meters);
    }
}
