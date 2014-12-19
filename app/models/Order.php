<?php

class Order extends Eloquent {

	public function user() {
		# Order belongs to User
		# Define an inverse one-to-many relationship:
		return $this->belongsTo('User');
	}
	
	public function food() {
	
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
		
	public $messages = array(
		'1' => 'Please choose between 0 and 50.',
		'3' => 'Please choose between 0 and 50.',
		'4' => 'Please choose between 0 and 50.',
		'6' => 'Please choose between 0 and 50.',
		'10' => 'Minimum order is for 10 people, please choose between 10 and 100.',
		'11' => 'Minimum order is for 10 people, please choose between 10 and 100.',
		'12' => 'Minimum order is for 10 people, please choose between 10 and 100.'
	);
		
	public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this->rules, $this->messages);
        
        // check for failure
        if ($v->fails())
        {
            // set errors and return false
            $this->errors = $v->errors();
            $this->messages = $v->messages();
            return false;
        }

        // validation pass
        return true;
    }
    
    public function errors()
    {
        return $this->errors;
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
