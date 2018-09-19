<?php declare(strict_types=1);

namespace HumanUnit;

use function HumanUnit\humanize;
use function HumanUnit\from_human;

final class Duration
{
    private $nano_seconds;

    private const multiples = [
        'y'  => 365 * 24 * 60 * 60 * 1000 * 1000 * 1000,
        'd'  => 24 * 60 * 60 * 1000 * 1000 * 1000,
        'h'  => 60 * 60 * 1000 * 1000 * 1000,
        'm'  => 60 * 1000 * 1000 * 1000,
        's'  => 1000 * 1000 * 1000,
        'ms' => 1000 * 1000,
        'µs' => 1000,
        'ns' => 1,
    ];

    private function __construct(int $nano_seconds)
    {
        $this->nano_seconds = $nano_seconds;
    }

    public static function from_human(string $representation): self
    {
        return new self(from_human(self::multiples, $representation));
    }

    public static function nano_seconds(int $nano_seconds): self
    {
        return new self($nano_seconds);
    }

    public static function micro_seconds(int $micro_seconds): self
    {
        return new self($micro_seconds * self::multiples['µs']);
    }

    public static function seconds(int $seconds): self
    {
        return new self($seconds * self::multiples['s']);
    }

    public static function minutes(int $minutes): self
    {
        return new self($minutes * self::multiples['m']);
    }

    public static function hours(int $hours): self
    {
        return new self($hours * self::multiples['h']);
    }

    public static function days(int $days): self
    {
        return new self($days * self::multiples['d']);
    }

    public static function years(int $years): self
    {
        return new self($years * self::multiples['y']);
    }

    public function humanize(): string
    {
        return humanize(self::multiples, $this->nano_seconds);
    }

    public function to_unit(string $unit): float
    {
        return floatval($this->nano_seconds / self::multiples[$unit]);
    }
}
