<?php declare(strict_types=1);

namespace HumanUnit;

function humanize(array $multiples, int $value): string
{
    foreach ($multiples as $unit => $step) {
        if ($value >= $step) {
            $multiple = intdiv($value, $step);
            $rest = intval(fmod($value, $step));
            return trim(sprintf('%d%s %s', $multiple, $unit, humanize($multiples, $rest)));
        }
    }
    return '';
}
