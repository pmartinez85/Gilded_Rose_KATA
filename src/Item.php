<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 4/12/16
 * Time: 18:19
 */

namespace App;


/**
 * Class Item
 * @package App
 */
class Item
{
    public $quality;
    public $sellIn;

    /**
     * Item constructor.
     * @param $quality
     * @param $sellIn
     */
    public function __construct($quality, $sellIn){
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }


    public function tick(){

        if (($this->quality > 0) || (($this->sellIn < 0) && ($this->quality > 0)))
            $this->quality = $this->quality - 1;
            $this->sellIn = $this->sellIn - 1;
    }





}