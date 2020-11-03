<?php

declare(strict_types=1);

namespace App;

class GildedRose
{
   
    
    public static function updateQuality($items)
    {
        for ($i = 0; $i < count($items); $i++) {
            $item = $items[$i];
            $itemName = $item->getName();
            $itemQuality =$item->getQuality();
            $itemMaxquality = 50;
            $itemMinQuality = 0;
            $itemQualityRate = 1;

            if (("Aged Brie" != $itemName) && ("Backstage passes to a TAFKAL80ETC concert" != $itemName)) {
                if ($itemQuality > $itemMinQuality) {
                    if ("Sulfuras, Hand of Ragnaros" != $itemName) {
                        $item->setQuality($itemQuality - $itemQualityRate);
                    }
                }
            } else {
                if ($itemQuality < $itemMaxquality) {
                    $item->setQuality($itemQuality + $itemQualityRate);
                    $itemQuality = $item->getQuality();
                    if ("Backstage passes to a TAFKAL80ETC concert" == $itemName) {
                        if ($item->getSellIn() < 11) {
                            if ($itemQuality < $itemMaxquality) {
                                $item->setQuality($itemQuality + $itemQualityRate);
                            }
                        }
                        if ($item->getSellIn() < 6) {
                            if ($itemQuality < $itemMaxquality) {
                                $item->setQuality($item->getQuality() + $itemQualityRate);
                            }
                        }
                    }
                }
            }

            if ("Sulfuras, Hand of Ragnaros" != $itemName) {
                $item->setSellIn($item->getSellIn() - $itemQualityRate);
            }

            if ($item->getSellIn() < 0) {
                if ("Aged Brie" != $itemName) {
                    if ("Backstage passes to a TAFKAL80ETC concert" != $itemName) {
                        if ($itemQuality > $itemMinQuality) {
                            if ("Sulfuras, Hand of Ragnaros" != $itemName) {
                                $item->setQuality($item->getQuality() - $itemQualityRate);
                                $itemQuality = $item->getQuality();;
                            }
                        }
                    } else {
                        $item->setQuality($itemQuality - $itemQuality);
                    }
                } else {
                    if ($itemQuality < $itemMaxquality) {
                        $item->setQuality($item->getQuality() + $itemQualityRate);
                    }
                }
            }
            
        }

    }
    
    
 
}
