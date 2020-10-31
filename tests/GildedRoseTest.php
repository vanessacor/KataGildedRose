<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\GildedRose;
use App\Item;

class GildedRoseTest extends TestCase
{

	public function test_Some_Item_Decrease_Quality_in_1_unit()
	{
		$someItem = new Item("Some Item", 2, 3);

		GildedRose::updateQuality([$someItem]);

		$this->assertEquals(2, $someItem->quality);
	}
	public function test_Some_Item_Decrease_Quality_in_double_unit_after_sellIn()
	{
		$someItem = new Item("Some Item", 1, 9);

		GildedRose::updateQuality([$someItem]);
		GildedRose::updateQuality([$someItem]);
		$result = $someItem->quality;

		$this->assertEquals(6, $result);
	}
}
