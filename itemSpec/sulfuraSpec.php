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
 * Class sulfuraSpec
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
}