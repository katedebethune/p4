<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function order() {
		#User has many Orders
		#Define a one-to-many relationship.
		return $this->hasMany('Order');
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
			'firstname' => 'required|alpha|min:1',
			'lastname' => 'required|alpha|min:2',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6'
		);
		
	public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this->rules);
        // check for failure
        if ($v->fails())
        {
            // set errors and return false
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
}
