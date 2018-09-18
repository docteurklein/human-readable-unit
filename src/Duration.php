<?php declare(strict_types=1);

namespace HumanUnit;

final class Duration
{
    private $micro_seconds;

    private static $steps = [
        'y'  => 365 * 24 * 60 * 60 * 1000 * 1000,
        'd'  => 24 * 60 * 60 * 1000 * 1000,
        'h'  => 60 * 60 * 1000 * 1000,
        'm'  => 60 * 1000 * 1000,
        's'  => 1000 * 1000,
        'ms' => 1000,
        'µs' => 1,
    ];

    private function __construct(int $micro_seconds)
    {
        $this->micro_seconds = $micro_seconds;
    }

    public static function micro_seconds(int $micro_seconds): self
    {
        return new self($micro_seconds);
    }

    public static function seconds(int $seconds): self
    {
        return new self($seconds * self::$steps['s']);
    }

    public static function minutes(int $minutes): self
    {
        return new self($minutes * self::$steps['m']);
    }

    public static function hours(int $hours): self
    {
        return new self($hours * self::$steps['h']);
    }

    public static function days(int $days): self
    {
        return new self($days * self::$steps['d']);
    }

    public static function years(int $years): self
    {
        return new self($years * self::$steps['y']);
    }

    public function format(): string
    {
        return self::_format($this->micro_seconds);
    }

    private static function _format(int $value): string
    {
        foreach (self::$steps as $unit => $step) {
            if ($value >= $step) {
                $multiple = intdiv($value, $step);
                $rest = intval(fmod($value, $step));
                return trim(sprintf('%d%s %s', $multiple, $unit, self::_format($rest)));
            }
        }
        return '';
    }
}
