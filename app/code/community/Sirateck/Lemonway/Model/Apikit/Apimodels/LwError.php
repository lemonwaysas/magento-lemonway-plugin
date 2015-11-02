<?php

class Sirateck_Lemonway_Model_Apikit_Apimodels_LwError{

	/**
     * CODE number
     * @var string
     */
    public $CODE;
	
	/**
     * MSG error message
     * @var string
     */
    public $MSG;
	
	function __construct($arr) {
		$this->CODE = $arr[0];
		$this->MSG = $arr[1];
	}
}
