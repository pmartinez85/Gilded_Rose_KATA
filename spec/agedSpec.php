<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 4/12/16
 * Time: 21:17
 */

namespace spec\App;

use App\GildedRose;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class agedBrieSpec
 * @package spec\App
 */
class GildedRoseSpec extends ObjectBehavior
{
    /**
     * Check it is initializable
     */
    function it_is_initializable()
    {
        $this->beConstructedWith('normal', 10, 5);
        $this->shouldHaveType(GildedRose::class);
    }

    /**
     * Check it updates Brie items before the sell date
     */
    function it_updates_Brie_items_before_sell_date()
    {
        $this->beConstructedWith('Aged Brie', 10, 5);
        $this->tick();
        $this->quality->shouldBe(11);
        $this->sellIn->shouldBe(4);
    }

    /**
     * Check it updates Brie items before the sell date with maximum quality
     */
    function it_updates_Brie_items_before_sell_date_with_maximum_quality()
    {
        $this->beConstructedWith('Aged Brie', 50, 5);
        $this->tick();
        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(4);
    }

    /**
     * Check it updates Brie items on the sell date
     */
    function it_updates_Brie_items_on_sell_date()
    {
        $this->beConstructedWith('Aged Brie', 10, 0);
        $this->tick();
        $this->quality->shouldBe(12);
        $this->sellIn->shouldBe(-1);
    }

    /**
     * Check it updates Brie items on the sell date, near maximum quality
     */
    function it_updates_Brie_items_on_sell_date_near_maximum_quality()
    {
        $this->beConstructedWith('Aged Brie', 49, 0);
        $this->tick();
        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(-1);
    }

    /**
     * Check it updates Brie items on the sell date with maximum quality
     */
    function it_updates_Brie_items_on_sell_date_with_maximum_quality()
    {
        $this->beConstructedWith('Aged Brie', 50, 0);
        $this->tick();
        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(-1);
    }

    /**
     * Check it updates Brie items after the sell date
     */
    function it_updates_Brie_items_after_sell_date()
    {
        $this->beConstructedWith('Aged Brie', 10, -10);
        $this->tick();
        $this->quality->shouldBe(12);
        $this->sellIn->shouldBe(-11);
    }

    /**
     * Check it updates Brie items after the sell date with maximum quality
     */
    function it_updates_Brie_items_after_sell_date_with_maximum_quality()
    {
        $this->beConstructedWith('Aged Brie', 50, -10);
        $this->tick();
        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(-11);
    }
}