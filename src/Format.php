<?php

namespace HumanUnit;

function format(array $multiples, int $value): string
{
    foreach ($multiples as $unit => $step) {
        if ($value >= $step) {
            $multiple = intdiv($value, $step);
            $rest = intval(fmod($value, $step));
            return trim(sprintf('%d%s %s', $multiple, $unit, format($multiples, $rest)));
        }
    }
    return '';
}
