<?php

class Food extends Eloquent {

	public function order() {
		#Food has many to many rel with orders
		#Define a m:m relationship
		return $this->belongsToMany('Order', 'food_order','food_id', 'order_id')->withPivot('quantity', 'extended_price');
	}
	
	public static function cateringMenu() {
		
		$catering_foods = Food::where('menu_code', '=', 'catering')
			->orWhere('menu_code', '=', 'both')
			->get();
		
		return $catering_foods;
	}
	
	public static function cafeMenu() {
		
		$cafe_foods = Food::where('menu_code', '=', 'cafe')
			->orWhere('menu_code', '=', 'both')
			->get();
		
		return $cafe_foods;
	}
	
	# Model events...
	# http://laravel.com/docs/eloquent#model-events
	public static function boot() {
        parent::boot();
        static::deleting(function($food) {
            DB::statement('DELETE FROM food_order WHERE food_id = ?', array($food->id));
        });
	}
}

?>


