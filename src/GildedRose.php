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

      
   
    public static function updateQuality($items)
    {
        
        foreach ($items as $item) {
            $itemName = $item->getName();
            $itemQuality =$item->getQuality();

            if ((self::$ageBrie != $itemName) && ("Backstage passes to a TAFKAL80ETC concert" != $itemName)) {
                if ($itemQuality > self::$minQuality) {
                    if ("Sulfuras, Hand of Ragnaros" != $itemName) {
                        $item->setQuality($itemQuality - self::$qualityRate);
                    }
                }
            } else {
                if ($itemQuality < self::$maxQuality) {
                    $item->setQuality($itemQuality + self::$qualityRate);
                    $itemQuality = $item->getQuality();
                    if ("Backstage passes to a TAFKAL80ETC concert" == $itemName) {
                        if ($item->getSellIn() < 11) {
                            if ($itemQuality < self::$maxQuality) {
                                $item->setQuality($itemQuality + self::$qualityRate);
                            }
                        }
                        if ($item->getSellIn() < 6) {
                            if ($itemQuality < self::$maxQuality) {
                                $item->setQuality($item->getQuality() + self::$qualityRate);
                            }
                        }
                    }
                }
            }

            if ("Sulfuras, Hand of Ragnaros" != $itemName) {
                $item->setSellIn($item->getSellIn() - self::$qualityRate);
            }

            if ($item->getSellIn() < 0) {
                if (self::$ageBrie!= $itemName) {
                    if ("Backstage passes to a TAFKAL80ETC concert" != $itemName) {
                        if ($itemQuality > self::$minQuality) {
                            if ("Sulfuras, Hand of Ragnaros" != $itemName) {
                                $item->setQuality($item->getQuality() - self::$qualityRate);
                                $itemQuality = $item->getQuality();;
                            }
                        }
                    } else {
                        $item->setQuality($itemQuality - $itemQuality);
                    }
                } else {
                    if ($itemQuality < self::$maxQuality) {
                        $item->setQuality($item->getQuality() + self::$qualityRate);
                    }
                }
            }
            
        }

    }
    
    
 
}
