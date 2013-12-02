<?php namespace formz;

/**
 * FormZ a set of simple PHP form helpers
 *
 * @license MIT
 * @package formz
 * @repo http://github.com/thybag/FormZ
 * @author Carl Saggs 
 *
 *
 * # Basic usage (PSR-0)
 *
 * use Formz\Form;
 *
 * ## Required Text field with default value of "bob"
 *
 * Form::text("name")
 *	->attributes(array('required'=>'required'))
 *	->defaultValue("Bob")
 *	->render(true);
 *
 * ## Select box with list of cows, css class cow_selector and default selection of Dexter
 *
 * Form::select("cow")
 *	->options(array(
 *		'A' => 'Angus',
 *		'D' => 'Dexter',
 *		'J' => 'Jersey',
 *		'H' => 'Holstein'
 *	))
 *	->attributes(array('class'=> 'cow_selector'))
 *	->defaultValue('D')
 *	->render(true);
 * 
 * ## Populate above fields from post values
 * 
 * Form::populate($_POST);
 * 
*/

class Form {


	// Static values
	public static $autoPopulate = false;
	public static $values = array();

	// Populate method
	public static function populate($values = array()){
		static::$autoPopulate = true;
		static::$values = $values;
	}

	public static function open($action = ''){
		return new Element\Form(true, $action);
	}

	public static function close(){
		return new Element\Form(false);
	}

	// Basic inputs
	public static function text($name){
		return new Element\Input($name, 'text');
	}

	public static function email($name){
		return new Element\Input($name, 'email');
	}

	public static function password($name){
		return new Element\Input($name, 'password');
	}

	public static function number($name){
		return new Element\Input($name, 'number');
	}
	
	public static function textarea($name){
		return new Element\TextArea($name, 'number');
	}

	// Build Select
	public static function select($name){
		return new Element\Select($name, 'select');
	}


}