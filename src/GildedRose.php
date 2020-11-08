<?php

declare(strict_types=1);

namespace App;

class GildedRose
{
    public static $maxQuality = 50;
    public static $minQuality = 0;
    public static $qualityRate = 1;
    public static $oneDay = 1;
    public static $ageBrie = "Aged Brie";
    public static $backstagePasses = "Backstage passes to a TAFKAL80ETC concert" ;
    public static $sulfuras = "Sulfuras, Hand of Ragnaros";
     
    
    public static function updateQuality($items)
    {
        
        foreach ($items as $item) 
        {
            $itemName = $item->getName();

            if($itemName === self::$sulfuras) 
            {
                return;
            }
            if($itemName === "Aged Brie" ) 
            {
                self::updateBrieItem($item);
                return;
            }
            if($itemName === "Backstage passes to a TAFKAL80ETC concert" ) 
            {
                self::updateTicketItem($item);
                return;
            }
            self::updateNonSpecialItem($item);
            
        }

    }

    public static function updateNonSpecialItem ($item)
    {
        $itemQuality = $item->getQuality();
        $itemSellIn = $item->getSellIn();
        if(self::isSellInZeroOrBelow($itemSellIn))
        {
            $item->setQuality(self::decrementQuality($itemQuality, 2));
            $item->setSellIn($itemSellIn - self::$oneDay);
            return;
        }
        $item->setQuality(self::decrementQuality($itemQuality, 1));
        $item->setSellIn($itemSellIn - self::$oneDay);

    }

    public static function updateBrieItem ($item)
    {
        $itemQuality = $item->getQuality();
        $item->setQuality(self::incrementQuality($itemQuality, self::$qualityRate));
        $item->setSellIn($item->getSellIn() - self::$oneDay);
    }

    public static function updateTicketItem ($item)
    {
        $itemQuality = $item->getQuality();
        $itemSellIn = $item->getSellIn();
        if($itemSellIn <= 0) {
            $item->setQuality(0);
            $item->setSellIn($itemSellIn - self::$oneDay);
            return;
        }
        if($itemSellIn <= 5) {
            $item->setQuality(self::incrementQuality($itemQuality, 3));
            $item->setSellIn($itemSellIn - self::$oneDay);
            return;
        }
        if($itemSellIn <= 10) {
            $item->setQuality(self::incrementQuality($itemQuality, 2));
            $item->setSellIn($itemSellIn - self::$oneDay);
            return;
        }
        $item->setQuality(self::incrementQuality($itemQuality, 1));
        $item->setSellIn($itemSellIn - self::$oneDay);
    }


    public static function isQualityAboveZero($itemQuality)
    {
        return $itemQuality > self::$minQuality;
    }

    public static function isSellInZeroOrBelow($itemSellIn)
    {
        return $itemSellIn <= 0;
    }

    public static function isQualityBelow50($itemQuality)
    {
        return $itemQuality < self::$maxQuality;
    }

    public static function isQualityAbove50($itemQuality)
    {
        return $itemQuality > self::$maxQuality;
    }

    public static function decrementQuality($itemQuality, $qualityRate)
    {
        if(self::isQualityAboveZero($itemQuality)) {
            return $itemQuality - $qualityRate;
        }
        return;
    }

    public static function incrementQuality($itemQuality, $qualityRate)
    {
        if(self::isQualityBelow50($itemQuality)){
            return $itemQuality + $qualityRate;
        }
        if(self::isQualityAbove50($itemQuality)){
            return $itemQuality;
        }
        return $itemQuality;
    }
 
}
