<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 4/12/16
 * Time: 21:16
 */


use App\GildedRose;

context ("Conjured Items", function () {
     it ('updates Conjured items before the sell date', function () {
         $item = GildedRose::of('Conjured Mana Cake', 10, 10);
         $item->tick();
         expect($item->quality)->toBe(8);
         expect($item->sellIn)->toBe(9);
     });
     it ('updates Conjured items at zero quality', function () {
         $item = GildedRose::of('Conjured Mana Cake', 0, 10);
         $item->tick();
         expect($item->quality)->toBe(0);
         expect($item->sellIn)->toBe(9);
     });
     it ('updates Conjured items on the sell date', function () {
         $item = GildedRose::of('Conjured Mana Cake', 10, 0);
         $item->tick();
         expect($item->quality)->toBe(6);
         expect($item->sellIn)->toBe(-1);
     });
     it ('updates Conjured items on the sell date at 0 quality', function () {
         $item = GildedRose::of('Conjured Mana Cake', 0, 0);
         $item->tick();
         expect($item->quality)->toBe(0);
         expect($item->sellIn)->toBe(-1);
     });
     it ('updates Conjured items after the sell date', function () {
         $item = GildedRose::of('Conjured Mana Cake', 10, -10);
         $item->tick();
         expect($item->quality)->toBe(6);
         expect($item->sellIn)->toBe(-11);
     });
     it ('updates Conjured items after the sell date at zero quality', function () {
         $item = GildedRose::of('Conjured Mana Cake', 0, -10);
         $item->tick();
         expect($item->quality)->toBe(0);
         expect($item->sellIn)->toBe(-11);
     });
 });
