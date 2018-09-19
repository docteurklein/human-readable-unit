<?php

namespace spec\HumanUnit;

use HumanUnit\Distance;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DistanceSpec extends ObjectBehavior
{
    function it_constructs_from_nano_meters()
    {
        $this->beConstructedThrough('nano_meters', [1]);
        $this->format()->shouldBe('1nm');
    }

    function it_formats_kilometers()
    {
        $this->beConstructedThrough('nano_meters', [intval(2 + 1e9 + 1e12)]);
        $this->format()->shouldBe('1km 1m 2nm');
    }
}
