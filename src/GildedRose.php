<?php

declare(strict_types=1);

namespace App;

class GildedRose
{
    public static $itemMaxQuality = 50;
    public static $itemMinQuality = 0;
    public static $itemQualityRate = 1;

      
    // public static function updateBrie( )  {
    //     quality increases;
    //     sellin date descreses;
    //     if sellingdate 
    // }

    public static function updateQuality($items)
    {
        
        foreach ($items as $item) {
            $itemName = $item->getName();
            $itemQuality =$item->getQuality();

            if (("Aged Brie" != $itemName) && ("Backstage passes to a TAFKAL80ETC concert" != $itemName)) {
                if ($itemQuality > self::$itemMinQuality) {
                    if ("Sulfuras, Hand of Ragnaros" != $itemName) {
                        $item->setQuality($itemQuality - self::$itemQualityRate);
                    }
                }
            } else {
                if ($itemQuality < self::$itemMaxQuality) {
                    $item->setQuality($itemQuality + self::$itemQualityRate);
                    $itemQuality = $item->getQuality();
                    if ("Backstage passes to a TAFKAL80ETC concert" == $itemName) {
                        if ($item->getSellIn() < 11) {
                            if ($itemQuality < self::$itemMaxQuality) {
                                $item->setQuality($itemQuality + self::$itemQualityRate);
                            }
                        }
                        if ($item->getSellIn() < 6) {
                            if ($itemQuality < self::$itemMaxQuality) {
                                $item->setQuality($item->getQuality() + self::$itemQualityRate);
                            }
                        }
                    }
                }
            }

            if ("Sulfuras, Hand of Ragnaros" != $itemName) {
                $item->setSellIn($item->getSellIn() - self::$itemQualityRate);
            }

            if ($item->getSellIn() < 0) {
                if ("Aged Brie" != $itemName) {
                    if ("Backstage passes to a TAFKAL80ETC concert" != $itemName) {
                        if ($itemQuality > self::$itemMinQuality) {
                            if ("Sulfuras, Hand of Ragnaros" != $itemName) {
                                $item->setQuality($item->getQuality() - self::$itemQualityRate);
                                $itemQuality = $item->getQuality();;
                            }
                        }
                    } else {
                        $item->setQuality($itemQuality - $itemQuality);
                    }
                } else {
                    if ($itemQuality < self::$itemMaxQuality) {
                        $item->setQuality($item->getQuality() + self::$itemQualityRate);
                    }
                }
            }
            
        }

    }
    
    
 
}
