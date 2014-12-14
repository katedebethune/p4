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
	
	/*
	|--------------------------------------------------------------------------
	| Validation rules within the model
	|--------------------------------------------------------------------------
	|
	| The following functions abstract the validation chores away from the
	| controller into their own classes. Modeled on the techniques in this 
	| article: http://daylerees.com/trick-validation-within-models
	|
	*/
	private $errors;
	
	private $rules = array(
			'1' => 'integer|min:0|max:50',
			'3' => 'integer|min:0|max:50',
			'4' => 'integer|min:0|max:50',
			'6' => 'integer|min:0|max:50',
			'10' => 'person_qt',
			'11' => 'person_qt',
			'12' => 'person_qt',
			'date_due' => 'required|date_format:n/j/Y|after:"+1 day"',
			'time_due' => 'required|date_format:g:i A|after:"9:59 AM"|before:"4:01 PM"'
		);
		
	public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this->rules);
        // return the result
        //return $v->passes();
        
        // check for failure
        if ($v->fails())
        {
            // set errors and return false
            //$this->errors = $v->errors;
            $this->errors = $v->errors();
            return false;
        }

        // validation pass
        return true;
    }
    
    public function errors()
    {
        return $this->errors;
    }
	
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
