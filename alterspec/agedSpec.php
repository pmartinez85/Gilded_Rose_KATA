<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 4/12/16
 * Time: 21:17
 */

use App\GildedRose;

describe('Gilded Rose', function () {
    describe('#tick', function () {
        context('Brie Items', function () {
            it('updates Brie items before the sell date', function () {
                $item = GildedRose::of('Aged Brie', 10, 5);
                $item->tick();
                expect($item->quality)->toBe(11);
                expect($item->sellIn)->toBe(4);
            });
            it('updates Brie items before the sell date with maximum quality', function () {
                $item = GildedRose::of('Aged Brie', 50, 5);
                $item->tick();
                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(4);
            });
            it('updates Brie items on the sell date', function () {
                $item = GildedRose::of('Aged Brie', 10, 0);
                $item->tick();
                expect($item->quality)->toBe(12);
                expect($item->sellIn)->toBe(-1);
            });
            it('updates Brie items on the sell date, near maximum quality', function () {
                $item = GildedRose::of('Aged Brie', 49, 0);
                $item->tick();
                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(-1);
            });
            it('updates Brie items on the sell date with maximum quality', function () {
                $item = GildedRose::of('Aged Brie', 50, 0);
                $item->tick();
                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(-1);
            });
            it('updates Brie items after the sell date', function () {
                $item = GildedRose::of('Aged Brie', 10, -10);
                $item->tick();
                expect($item->quality)->toBe(12);
                expect($item->sellIn)->toBe(-11);
            });
            it('updates Briem items after the sell date with maximum quality', function () {
                $item = GildedRose::of('Aged Brie', 50, -10);
                $item->tick();
                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(-11);
            });

        });
    });
});