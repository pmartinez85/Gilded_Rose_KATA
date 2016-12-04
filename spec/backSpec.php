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
     * Check it updates Backstage pass items long before the sell date
     */
    function it_updates_BackstagePassItems_long_before_sell_date()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert',10,11);
        $this->tick();
        $this->quality->shouldBe(11);
        $this->sellIn->shouldBe(10);
    }
    /**
     * Check it updates Backstage pass items close to the sell date
     */
    function it_updates_BackstagePassItems_close_to_sell_date()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert',10,10);
        $this->tick();
        $this->quality->shouldBe(12);
        $this->sellIn->shouldBe(9);
    }
    /**
     * Check it updates Backstage pass items close to the sell data, at max quality
     */
    function it_updates_BackstagePassItems_close_sell_date_at_maxQuality()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert',50,10);
        $this->tick();
        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(9);
    }
    /**
     * Check it updates Backstage pass items very close to the sell date
     */
    function it_updates_BackstagePassItems_veryCloseToSell_date()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert',10,5);
        $this->tick();
        $this->quality->shouldBe(13);
        $this->sellIn->shouldBe(4);
    }
    /**
     * Check it updates Backstage pass items very close to the sell data, at max quality
     */
    function it_updates_BackstagePassItems_veryCloseSell_date_at_maxQuality()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert',50,5);
        $this->tick();
        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(4);
    }
    /**
     * Check it updates Backstage pass items with one day left to sell
     */
    function it_updates_BackstagePassItems_with_oneDayLefToSell()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert',10,1);
        $this->tick();
        $this->quality->shouldBe(13);
        $this->sellIn->shouldBe(0);
    }
    /**
     * Check it updates Backstage pass items with one day left to sell, at max quality
     */
    function it_updates_BackstagePassItems_with_oneDayLefToSell_at_maxQuality()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert',50,1);
        $this->tick();
        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(0);
    }
    /**
     * Check it updates Backstage pass items on the sell date
     */
    function it_updates_BackstagePassItems_on_sell_date()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert',10,0);
        $this->tick();
        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(-1);
    }
    /**
     * Check it updates Backstage pass items after the sell date
     */
    function it_updates_BackstagePassItems_after_sell_date()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert',10,-1);
        $this->tick();
        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(-2);
    }

}