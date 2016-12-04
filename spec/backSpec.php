<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 4/12/16
 * Time: 21:17
 */

context('Backstage Passes', function () {
    /*
        "Backstage passes", like aged brie, increases in Quality as it's SellIn
        value approaches; Quality increases by 2 when there are 10 days or
        less and by 3 when there are 5 days or less but Quality drops to
        0 after the concert
     */
    it ('updates Backstage pass items long before the sell date', function () {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 11);
        $item->tick();
        expect($item->quality)->toBe(11);
        expect($item->sellIn)->toBe(10);
    });
    it ('updates Backstage pass items close to the sell date', function () {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 10);
        $item->tick();
        expect($item->quality)->toBe(12);
        expect($item->sellIn)->toBe(9);
    });
    it ('updates Backstage pass items close to the sell data, at max quality', function () {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 50, 10);
        $item->tick();
        expect($item->quality)->toBe(50);
        expect($item->sellIn)->toBe(9);
    });
    it ('updates Backstage pass items very close to the sell date', function () {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 5);
        $item->tick();
        expect($item->quality)->toBe(13); // goes up by 3
        expect($item->sellIn)->toBe(4);
    });
    it ('updates Backstage pass items very close to the sell date, at max quality', function () {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 50, 5);
        $item->tick();
        expect($item->quality)->toBe(50);
        expect($item->sellIn)->toBe(4);
    });
    it ('updates Backstage pass items with one day left to sell', function () {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 1);
        $item->tick();
        expect($item->quality)->toBe(13);
        expect($item->sellIn)->toBe(0);
    });
    it ('updates Backstage pass items with one day left to sell, at max quality', function () {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 50, 1);
        $item->tick();
        expect($item->quality)->toBe(50);
        expect($item->sellIn)->toBe(0);
    });
    it ('updates Backstage pass items on the sell date', function () {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 0);
        $item->tick();
        expect($item->quality)->toBe(0);
        expect($item->sellIn)->toBe(-1);
    });
    it ('updates Backstage pass items after the sell date', function () {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, -1);
        $item->tick();
        expect($item->quality)->toBe(0);
        expect($item->sellIn)->toBe(-2);
    });
});