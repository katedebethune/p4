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
		return $this->belongsToMany('Food');
	}
	
	/* public static function singleOrderDetailsToArray($id) {

		$order_detail = Order::findOrFail($id)->food()->select('food_id', 'quantity')->get();

		return $order_detail->toArray();
	} */
	
	 /**
    * This array will compare an array of given foods with existing foods
    * and figure out which ones need to be added and which ones need to be deleted
    */
    /*
    public function updateTags($new = array()) {
        // Go through new tags to see what ones need to be added
        foreach($new as $tag) {
            if(!$this->tags->contains($tag)) {
                $this->tags()->save(Tag::find($tag));
            }
        }
        // Go through existing tags and see what ones need to be deleted
        foreach($this->tags as $tag) {
            if(!in_array($tag->pivot->tag_id,$new)) {
                $this->tags()->detach($tag->id);
            }
        }
    } */
    
    public function updateFoods($new = array()) {
        // Go through new tags to see what ones need to be added
        foreach($new as $food) {
            if(!$this->food->contains($food)) {
                $this->food()->save(Food::find($food));
            }
        }
        // Go through existing tags and see what ones need to be deleted
        foreach($this->food as $food) {
            if(!in_array($food->pivot->food_id,$new)) {
                $this->food()->detach($food->id);
            }
        }
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
