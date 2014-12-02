<?php

class Food extends Eloquent {

	public function order() {
		#Food has many to many rel with orders
		#Define a m:m relationship
		return $this->belongsToMany('Order', 'food_order','food_id', 'order_id')->withPivot('quantity');
	}
}

?>
