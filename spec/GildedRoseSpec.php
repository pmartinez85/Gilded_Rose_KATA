<?php

namespace spec\App;

use App\GildedRose;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class GildedRoseSpec
 * @package spec\App
 * @group normal
 */
class GildedRoseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('normal', 10, 5);
        $this->shouldHaveType(GildedRose::class);
    }

    /**
     * Check it updates normal items before sell date
     */
    function it_updates_normal_items_before_sell_date()
    {
        $this->beConstructedWith('normal', 10, 5);
        $this->tick();
        $this->quality->shouldBe(9);
        $this->sellIn->shouldBe(4);
    }

    /**
     * Check it updates normal items on the sell date
     */
    function it_updates_normal_items_on_the_sell_date()
    {
        $this->beConstructedWith('normal', 10, 0);
        $this->tick();
        $this->quality->shouldBe(8);
        $this->sellIn->shouldBe(-1);
    }

    /**
     * Check it updates normal items after the sell date
     */
    function it_updates_normal_items_after_the_sell_date()
    {
        $this->beConstructedWith('normal', 10, -5);
        $this->tick();
        $this->quality->shouldBe(8);
        $this->sellIn->shouldBe(-6);
    }

    /**
     * Check it updates normal items with a quality of 0
     */
    function it_updates_normal_items_with_a_quality_of_0()
    {
        $this->beConstructedWith('normal', 0, 5);
        $this->tick();
        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(4);
    }

}
