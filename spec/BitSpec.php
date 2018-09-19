<?php

namespace spec\HumanUnit;

use HumanUnit\Distance;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BitSpec extends ObjectBehavior
{
    function it_constructs_from_bytes()
    {
        $this->beConstructedThrough('byte', [1024]);
        $this->humanize()->shouldBe('1kB 24B');
    }

    function it_constructs_from_bit()
    {
        $this->beConstructedWith(8);
        $this->humanize()->shouldBe('1B');
    }

    function it_constructs_from_human_representation()
    {
        $this->beConstructedThrough('from_human', ['2GB']);
        $this->humanize()->shouldBe('2GB');
        $this->to_unit('kb')->shouldBeLike(2e6 * 8);
    }
}
