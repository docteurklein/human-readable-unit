<?php

namespace spec\HumanUnit;

use HumanUnit\Duration;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DurationSpec extends ObjectBehavior
{
    function it_constructs_from_human_representation()
    {
        $this->beConstructedThrough('from_human', ['1d 22h 13s']);
        $this->humanize()->shouldBe('1d 22h 13s');
    }

    function it_constructs_from_nano_seconds()
    {
        $this->beConstructedThrough('nano_seconds', [1]);
        $this->humanize()->shouldBe('1ns');
    }

    function it_constructs_from_micro_seconds_1()
    {
        $this->beConstructedThrough('micro_seconds', [1]);
        $this->humanize()->shouldBe('1µs');
    }

    function it_constructs_from_seconds_1()
    {
        $this->beConstructedThrough('seconds', [86400]);
        $this->humanize()->shouldBe('1d');
    }

    function it_constructs_from_seconds_2()
    {
        $this->beConstructedThrough('seconds', [86401]);
        $this->humanize()->shouldBe('1d 1s');
    }

    function it_constructs_from_seconds_3()
    {
        $this->beConstructedThrough('seconds', [86399]);
        $this->humanize()->shouldBe('23h 59m 59s');
    }

    function it_constructs_from_seconds_4()
    {
        $this->beConstructedThrough('seconds', [0]);
        $this->humanize()->shouldBe('');
    }

    function it_constructs_from_seconds_5()
    {
        $this->beConstructedThrough('seconds', [1]);
        $this->humanize()->shouldBe('1s');
    }

    function it_constructs_from_minutes()
    {
        $this->beConstructedThrough('minutes', [72]);
        $this->humanize()->shouldBe('1h 12m');
    }

    function it_constructs_from_hours()
    {
        $this->beConstructedThrough('hours', [49]);
        $this->humanize()->shouldBe('2d 1h');
    }

    function it_constructs_from_days()
    {
        $this->beConstructedThrough('days', [365 + 2]);
        $this->humanize()->shouldBe('1y 2d');
    }

    function it_constructs_from_years()
    {
        $this->beConstructedThrough('years', [2]);
        $this->humanize()->shouldBe('2y');
    }

    function it_formats_milli_secends()
    {
        $this->beConstructedThrough('micro_seconds', [1000 * 2]);
        $this->humanize()->shouldStartWith('2ms');
    }

    function it_formats_minutes()
    {
        $this->beConstructedThrough('seconds', [60 * 2]);
        $this->humanize()->shouldStartWith('2m');
    }

    function it_formats_hours()
    {
        $this->beConstructedThrough('seconds', [60 * 60 * 3]);
        $this->humanize()->shouldStartWith('3h');
    }

    function it_formats_years()
    {
        $this->beConstructedThrough('seconds', [86400 * 400]);
        $this->humanize()->shouldBe('1y 35d');
    }
}
