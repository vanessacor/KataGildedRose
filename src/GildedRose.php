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

            if (("Aged Brie" != $itemName) && ("Backstage passes to a TAFKAL80ETC concert" != $itemName)) {
                if ($itemQuality > 0) {
                    if ("Sulfuras, Hand of Ragnaros" != $itemName) {
                        $item->setQuality($itemQuality - 1);
                    }
                }
            } else {
                if ($itemQuality < 50) {
                    $item->setQuality($itemQuality + 1);
                    $itemQuality = $item->getQuality();
                    if ("Backstage passes to a TAFKAL80ETC concert" == $itemName) {
                        if ($item->getSellIn() < 11) {
                            if ($itemQuality < 50) {
                                $item->setQuality($itemQuality + 1);
                            }
                        }
                        if ($item->getSellIn() < 6) {
                            if ($itemQuality < 50) {
                                $item->setQuality($item->getQuality() + 1);
                            }
                        }
                    }
                }
            }

            if ("Sulfuras, Hand of Ragnaros" != $itemName) {
                $item->setSellIn($item->getSellIn() - 1);
            }

            if ($item->getSellIn() < 0) {
                if ("Aged Brie" != $itemName) {
                    if ("Backstage passes to a TAFKAL80ETC concert" != $itemName) {
                        if ($itemQuality > 0) {
                            if ("Sulfuras, Hand of Ragnaros" != $itemName) {
                                $item->setQuality($item->getQuality() - 1);
                                $itemQuality = $item->getQuality();;
                            }
                        }
                    } else {
                        $item->setQuality($itemQuality - $itemQuality);
                    }
                } else {
                    if ($itemQuality < 50) {
                        $item->setQuality($item->getQuality() + 1);
                    }
                }
            }
        }
    }

 
}
