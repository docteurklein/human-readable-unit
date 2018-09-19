<?php

namespace HumanUnit;

function from_human(array $multiples, string $representation): int
{
    return array_reduce(explode(' ', $representation), function($carry, $item) use($multiples) {
        $unit = substr($item, -1, 1);
        $value = intval($item);
        return $carry + ($value * $multiples[$unit]);
    }, 0);
}
