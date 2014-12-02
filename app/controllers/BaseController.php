<?php

class BaseController extends Controller {

	public function __construct() {
       // do whatever you want here for this and any derivative classes, e.g. Pruebas
      // but do not call Controller 
    }
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
