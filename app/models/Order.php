<?php

class Order extends Eloquent {

	public function user() {
		# Order belongs to User
		# Define an inverse one-to-many relationship:
		return $this->belongsTo('User');
	}
	
	public function food() {
		#
		#
		#return $this->belongsToMany('Food','food_order', 'food_id', 'order_id')->withPivot('quantity');
		return $this->belongsToMany('Food');
	}
}

?>
