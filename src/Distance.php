<?php

namespace HumanUnit;

final class Distance
{
    use Format;

    private $nano_meters;

    private static $multiples = [
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
        return self::_format($this->nano_meters);
    }
}
