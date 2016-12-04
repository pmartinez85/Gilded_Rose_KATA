<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 4/12/16
 * Time: 21:16
 */


namespace spec\App;

use App\GildedRose;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class conjuredSpec
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
