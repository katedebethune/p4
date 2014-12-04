<?php

class OrderController extends BaseController {

	/**
	*
	*/
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

        $this->beforeFilter('guest',
        	array(
        		'only' => array('getLogin','getSignup')
        	));

    }
    
    /**
	* Display orders for the currently logged in user
	*
	*/
	public function getOrders() {
		 
		if (Auth::check()) {
			$id = Auth::id();
		} 
		else {
			return Redirect::to('/login');
		}
	
		$orders = Order::whereHas('user', function($q) use($id)
		{
			$q->where('id', '=', $id);
	
		})->get();
	
		foreach($orders as $order) {
			echo $order->user->id.' '.$order->user->firstname.' '.$order->user->lastname.' due: '.$order->due.'<br>';
			foreach($order->food()->select('name', 'quantity', 'price')->get() as $food){
				print '<li>' . $food->name . ' ' . $food->quantity . ' ' . $food->price;
			}
			echo '<br>';
		}

	}
}

?>

