<?php

namespace spec\App;

use App\GildedRose;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class GildedRoseSpec
 * @package spec\App
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

    /**
     * Check it updates Backstage pass items long before the sell date
     */
    function it_updates_BackstagePassItems_long_before_sell_date()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 10, 11);
        $this->tick();
        $this->quality->shouldBe(11);
        $this->sellIn->shouldBe(10);
    }

    /**
     * Check it updates Backstage pass items close to the sell date
     */
    function it_updates_BackstagePassItems_close_to_sell_date()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 10, 10);
        $this->tick();
        $this->quality->shouldBe(12);
        $this->sellIn->shouldBe(9);
    }

    /**
     * Check it updates Backstage pass items close to the sell data, at max quality
     */
    function it_updates_BackstagePassItems_close_sell_date_at_maxQuality()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 50, 10);
        $this->tick();
        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(9);
    }

    /**
     * Check it updates Backstage pass items very close to the sell date
     */
    function it_updates_BackstagePassItems_veryCloseToSell_date()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 10, 5);
        $this->tick();
        $this->quality->shouldBe(13);
        $this->sellIn->shouldBe(4);
    }

    /**
     * Check it updates Backstage pass items very close to the sell data, at max quality
     */
    function it_updates_BackstagePassItems_veryCloseSell_date_at_maxQuality()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 50, 5);
        $this->tick();
        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(4);
    }

    /**
     * Check it updates Backstage pass items with one day left to sell
     */
    function it_updates_BackstagePassItems_with_oneDayLefToSell()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 10, 1);
        $this->tick();
        $this->quality->shouldBe(13);
        $this->sellIn->shouldBe(0);
    }

    /**
     * Check it updates Backstage pass items with one day left to sell, at max quality
     */
    function it_updates_BackstagePassItems_with_oneDayLefToSell_at_maxQuality()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 50, 1);
        $this->tick();
        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(0);
    }

    /**
     * Check it updates Backstage pass items on the sell date
     */
    function it_updates_BackstagePassItems_on_sell_date()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 10, 0);
        $this->tick();
        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(-1);
    }

    /**
     * Check it updates Backstage pass items after the sell date
     */
    function it_updates_BackstagePassItems_after_sell_date()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 10, -1);
        $this->tick();
        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(-2);
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

    /**
     * Check it updates Sulfuras items before the sell date
     */
    function it_updates_Sulfuras_items_before_sell_date()
    {
        $this->beConstructedWith('Sulfuras, Hand of Ragnaros', 10, 5);
        $this->tick();
        $this->quality->shouldBe(10);
        $this->sellIn->shouldBe(5);
    }

    /**
     * Check it updates Sulfuras items on the sell date
     */
    function it_updates_Sulfuras_items_on_sell_date()
    {
        $this->beConstructedWith('Sulfuras, Hand of Ragnaros', 10, 0);
        $this->tick();
        $this->quality->shouldBe(10);
        $this->sellIn->shouldBe(0);
    }

    /**
     * Check it updates Sulfuras items after the sell date
     */
    function it_updates_Sulfuras_items_after_sell_date()
    {
        $this->beConstructedWith('Sulfuras, Hand of Ragnaros', 10, -1);
        $this->tick();
        $this->quality->shouldBe(10);
        $this->sellIn->shouldBe(-1);
    }

    /**
     * Check if updates Conjured items before sell date
     */
    function it_updates_ConjuredItems_before_sell_date()
    {
        $this->beConstructedWith('Conjured Mana Cake', 10, 10);
        $this->tick();
        $this->quality->shouldBe(8);
        $this->sellIn->shouldBe(9);
    }

    /**
     * Check it updates Conjured items at zero quality
     */
    function it_updates_ConjuredItems_at_zeroQuality()
    {
        $this->beConstructedWith('Conjured Mana Cake', 0, 10);
        $this->tick();
        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(9);
    }

    /**
     * Check it updates Conjured items on the sell date
     */
    function it_updates_ConjuredItems_on_sell_date()
    {
        $this->beConstructedWith('Conjured Mana Cake', 10, 0);
        $this->tick();
        $this->quality->shouldBe(6);
        $this->sellIn->shouldBe(-1);
    }

    /**
     * Check it updates Conjured items on the sell date at zero quality
     */
    function it_updates_ConjuredItems_on_sell_date_at_ZeroQuality()
    {
        $this->beConstructedWith('Conjured Mana Cake', 0, 0);
        $this->tick();
        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(-1);
    }

    /**
     * Check it updates Conjured items after the sell date
     */
    function it_updates_ConjuredItems_after_sell_date()
    {
        $this->beConstructedWith('Conjured Mana Cake', 10, -10);
        $this->tick();
        $this->quality->shouldBe(6);
        $this->sellIn->shouldBe(-11);
    }

    /**
     * Check it updates Conjured items after the sell date at zero quality
     */
    function it_updates_ConjuredItems_after_sell_date_at_zeroQuality()
    {
        $this->beConstructedWith('Conjured Mana Cake', 0, -10);
        $this->tick();
        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(-11);
    }
}
