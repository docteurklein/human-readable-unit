<?php

namespace spec\HumanUnit;

use HumanUnit\Distance;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CardinalitySpec extends ObjectBehavior
{
    function it_constructs_from_kilo()
    {
        $this->beConstructedThrough('kilo', [1]);
        $this->humanize()->shouldBe('1k');
    }

    function it_constructs_from_human_representation()
    {
        $this->beConstructedThrough('from_human', ['2G 1k']);
        $this->humanize()->shouldBe('2G 1k');
        $this->to_unit('k')->shouldBeLike(2000001);
    }
}
