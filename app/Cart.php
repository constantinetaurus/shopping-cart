<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQtyItems = 0;
	public $totalPrice = 0;

	public function __construct($oldCart)
	{
		if($oldCart)
		{
			$this->items = $oldCart->items;
			$this->totalQtyItems = $oldCart->totalQtyItems;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id)
	{
		$storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
		if($this->items)
		{
			if(array_key_exists($id, $this->items))
			{
				$storedItem = $this->items[$id];
			}
		}
		$storedItem['qty']++;
		$storedItem['price'] = $item->price * $storedItem['qty'];
		$this->items[$id] = $storedItem;
		$this->totalQtyItems++;
		$this->totalPrice += $item->price;
	}
}