<?php

namespace HumanUnit;

trait Format
{
    private static function _format(int $value): string
    {
        foreach (self::$multiples as $unit => $step) {
            if ($value >= $step) {
                $multiple = intdiv($value, $step);
                $rest = intval(fmod($value, $step));
                return trim(sprintf('%d%s %s', $multiple, $unit, self::_format($rest)));
            }
        }
        return '';
    }
}
