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
	
	public static function singleOrderDetailsToArray($id) {

		$order_detail = Order::findOrFail($id)->food()->select('food_id', 'quantity')->get();

		return $order_detail->toArray();
	}
		
	
	# Model events...
	# http://laravel.com/docs/eloquent#model-events
	public static function boot() {
        parent::boot();
        static::deleting(function($order) {
            DB::statement('DELETE FROM food_order WHERE order_id = ?', array($order->id));
        });
	}
}

?>
