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

    function it_constructs_from_human_representation()
    {
        $this->beConstructedThrough('from_human', ['1km 2m']);
        $this->format()->shouldBe('1km 2m');
    }

    function it_refuses_invalid_human_representation_1()
    {
        $this->beConstructedThrough('from_human', ['1 2m']);
        $this->shouldThrow('InvalidArgumentException')->duringInstantiation();
    }

    function it_refuses_invalid_human_representation_2()
    {
        $this->beConstructedThrough('from_human', ['1.2km 2m']);
        $this->shouldThrow('InvalidArgumentException')->duringInstantiation();
    }

    function it_refuses_unknown_unit()
    {
        $this->beConstructedThrough('from_human', ['1pf']);
        $this->shouldThrow('InvalidArgumentException')->duringInstantiation();
    }

    function it_formats_kilometers()
    {
        $this->beConstructedThrough('nano_meters', [intval(2 + 1e9 + 1e12)]);
        $this->format()->shouldBe('1km 1m 2nm');
    }
}
