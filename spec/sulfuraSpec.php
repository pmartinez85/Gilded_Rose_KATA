<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 4/12/16
 * Time: 21:17
 */

context('Sulfuras Items', function () {
    it ('updates Sulfuras items before the sell date', function () {
        $item = GildedRose::of('Sulfuras, Hand of Ragnaros', 10, 5);
        $item->tick();
        expect($item->quality)->toBe(10);
        expect($item->sellIn)->toBe(5);
    });
    it ('updates Sulfuras items on the sell date', function () {
        $item = GildedRose::of('Sulfuras, Hand of Ragnaros', 10, 5);
        $item->tick();
        expect($item->quality)->toBe(10);
        expect($item->sellIn)->toBe(5);
    });
    it ('updates Sulfuras items after the sell date', function () {
        $item = GildedRose::of('Sulfuras, Hand of Ragnaros', 10, -1);
        $item->tick();
        expect($item->quality)->toBe(10);
        expect($item->sellIn)->toBe(-1);
    });
});