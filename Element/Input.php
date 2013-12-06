<?php

namespace formz\Element;

class Input extends Element {

	// Basic field attributes
	public $name = '';
	public $type = null;
	public $default = '';
	public $required = false;
	

	// New field needs name (type is kinda optional)
	public function __construct($name, $type = 'text'){
		$this->name = $name;
		$this->type = $type;
	}

	/**
	 * set default value (can be overwritten by Form::populate();)
	 *
	 * @param $value
	 * @return FormElement
	 */
	public function defaultValue($value){
		$this->default = $value;
		return $this;
	}

	/**
	 * set field to be required
	 *
	 * @param $required true|false (no option = true)
	 * @return FormElement
	 */
	public function required($required = true){
		$this->required = $required;
		return $this;
	}

	/**
	 * generate element markup
	 */
	protected function build(){
		// get attributes
		$attributes = $this->attributesToString();

		// get value
		$value = $this->getValue();
		if(!$value){ 
			$valueHTML = '';
		}else{
			$valueHTML = " value='{$value}'";
		}

		

		// create markup
		return "<input type='{$this->type}' name='{$this->name}' {$valueHTML} {$attributes} />";
	}


	// Extend attributes method to add in required when set
	protected function attributesToString(){
		$attributes = parent::attributesToString();

		// Add additional attributes (required, class, id)
		$required = ($this->required) ? "required='required' " : '';

		return $required.$attributes;
	}
	/**
	 * get element value
	 */
	protected function getValue(){
		$val = null;
		// get val
		if(\formz\Form::$autoPopulate && isset(\formz\Form::$values[$this->name])){
			$val = \formz\Form::$values[$this->name];
		}elseif($this->default !== ''){
			$val = $this->default;
		}

		// Don't trust the value, as it could be direct from $_POST
		return ($val === null) ? null : htmlspecialchars($val);
	}
}