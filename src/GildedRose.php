<?php

namespace App;

/**
 * Class GildedRose
 * @package App
 */
class GildedRose
{
    public $name;

    public $quality;

    public $sellIn;

    /**
     * GildedRose constructor.
     * @param $name
     * @param $quality
     * @param $sellIn
     */
    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }


    public function tick()
    {
        switch ($this->name){
            case 'Aged Brie':
                if ($this->quality < 50)
                    $this->quality = $this->quality + 1;
                $this->sellIn = $this->sellIn - 1;
                if (($this->sellIn < 0) && ($this->quality < 50)) {$this->quality = $this->quality + 1;}
                break;
            case 'Conjured Mana Cake':
                if ($this->quality > 0)
                    $this->quality = $this->quality - 2;
                $this->sellIn = $this->sellIn - 1;
                if (($this->sellIn < 0) && ($this->quality > 0)){$this->quality = $this->quality - 2;}
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
                if (($this->quality < 50) || (($this->sellIn < 11) && ($this->quality < 50)) || (($this->sellIn < 6) && ($this->quality < 50)))
                    $this->quality = $this->quality + 1;
                $this->sellIn = $this->sellIn - 1;
                if ($this->sellIn < 0) {$this->quality = $this->quality - $this->quality;}
                break;
            case 'Sulfuras, Hand of Ragnaros':
                break;
            default:
                if ($this->quality > 0)
                    $this->quality = $this->quality - 1;
                $this->sellIn = $this->sellIn - 1;
                if (($this->sellIn < 0) && ($this->quality > 0)) {
                        $this->quality = $this->quality - 1;
                }
                break;
        }
    }









}