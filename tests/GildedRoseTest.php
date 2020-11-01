<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\GildedRose;
use App\Item;

class GildedRoseTest extends TestCase
{

	public function test_item_decrease_quality_in_1_unit()
	{
		$someItem = new Item("Some Item", 2, 3);

		GildedRose::updateQuality([$someItem]);

		$this->assertEquals(2, $someItem->quality);
	}

	public function test_item_decrease_quality_in_double_unit_after_sellIn()
	{
		$someItem = new Item("Some Item", 1, 9);

		GildedRose::updateQuality([$someItem]);
		GildedRose::updateQuality([$someItem]);
		$result = $someItem->quality;

		$this->assertEquals(6, $result);
	}

	public function test_Some_Item_Quality_never_below_0()
	{
		$someItem = new Item("Some Item", 1, 1);

		GildedRose::updateQuality([$someItem]);
		GildedRose::updateQuality([$someItem]);
		$result = $someItem->quality;

		$this->assertEquals(0, $result);
	}

	public function test_AgeBrie_Item_increases_quality_instead_decrease()
	{
		$brieItem = new Item("Aged Brie", 2, 3);

		GildedRose::updateQuality([$brieItem]);
		$result = $brieItem->quality;

		$this->assertEquals(4, $result);
	}

	public function test_item_quality_never_above_50()
	{
		$brieItem = new Item("Aged Brie", 2, 50);

		GildedRose::updateQuality([$brieItem]);
		$result = $brieItem->quality;

		$this->assertEquals(50, $result);
	}
}
