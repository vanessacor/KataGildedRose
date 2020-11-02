<?php

declare(strict_types=1);

namespace App;

class GildedRose
{

    public static function updateQuality($items)
    {
        for ($i = 0; $i < count($items); $i++) {
            $itemName = $items[$i]->getName();

            if (("Aged Brie" != $itemName) && ("Backstage passes to a TAFKAL80ETC concert" != $itemName)) {
                if ($items[$i]->getQuality() > 0) {
                    if ("Sulfuras, Hand of Ragnaros" != $itemName) {
                        $items[$i]->setQuality($items[$i]->getQuality() - 1);
                    }
                }
            } else {
                if ($items[$i]->getQuality() < 50) {
                    $items[$i]->setQuality($items[$i]->getQuality() + 1);
                    if ("Backstage passes to a TAFKAL80ETC concert" == $itemName) {
                        if ($items[$i]->getSellIn() < 11) {
                            if ($items[$i]->getQuality() < 50) {
                                $items[$i]->setQuality($items[$i]->getQuality() + 1);
                            }
                        }
                        if ($items[$i]->getSellIn() < 6) {
                            if ($items[$i]->getQuality() < 50) {
                                $items[$i]->setQuality($items[$i]->getQuality() + 1);
                            }
                        }
                    }
                }
            }

            if ("Sulfuras, Hand of Ragnaros" != $itemName) {
                $items[$i]->setSellIn($items[$i]->getSellIn() - 1);
            }

            if ($items[$i]->getSellIn() < 0) {
                if ("Aged Brie" != $itemName) {
                    if ("Backstage passes to a TAFKAL80ETC concert" != $itemName) {
                        if ($items[$i]->getQuality() > 0) {
                            if ("Sulfuras, Hand of Ragnaros" != $itemName) {
                                $items[$i]->setQuality($items[$i]->getQuality() - 1);
                            }
                        }
                    } else {
                        $items[$i]->setQuality($items[$i]->getQuality() - $items[$i]->getQuality());
                    }
                } else {
                    if ($items[$i]->getQuality() < 50) {
                        $items[$i]->setQuality($items[$i]->getQuality() + 1);
                    }
                }
            }
        }
    }

 
}
