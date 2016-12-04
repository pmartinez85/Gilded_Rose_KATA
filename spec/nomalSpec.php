<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 4/12/16
 * Time: 21:18
 */

context ('normal Items', function () {
    it ('updates normal items before sell date', function () {
        $item = GildedRose::of('normal', 10, 5); // quality, sell in X days
        $item->tick();
        expect($item->quality)->toBe(9);
        expect($item->sellIn)->toBe(4);
    });
    it ('updates normal items on the sell date', function () {
        $item = GildedRose::of('normal', 10, 0);
        $item->tick();
        expect($item->quality)->toBe(8);
        expect($item->sellIn)->toBe(-1);
    });
    it ('updates normal items after the sell date', function () {
        $item = GildedRose::of('normal', 10, -5);
        $item->tick();
        expect($item->quality)->toBe(8);
        expect($item->sellIn)->toBe(-6);
    });
    it ('updates normal items with a quality of 0', function () {
        $item = GildedRose::of('normal', 0, 5);
        $item->tick();
        expect($item->quality)->toBe(0);
        expect($item->sellIn)->toBe(4);
    });
});