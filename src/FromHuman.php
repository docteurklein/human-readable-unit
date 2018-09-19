<?php

namespace HumanUnit;

function from_human(array $multiples, string $representation): int
{
    return array_reduce(explode(' ', $representation), function($carry, $item) use($multiples, $representation) {
        preg_match('/^(\d+)(\w+)$/', $item, $matches);
        if (count($matches) !== 3) {
            throw new \InvalidArgumentException(sprintf('Invalid entry "%s" in "s"', $item, $representation));
        }
        if (!isset($multiples[$matches[2]])) {
            throw new \InvalidArgumentException(sprintf('Invalid unit "%s" in "%s", use one of [%s]', $matches[2], $item, implode(', ', array_keys($multiples))));
        }
        return $carry + ($matches[1] * $multiples[$matches[2]]);
    }, 0);
}
