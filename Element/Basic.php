<?php

namespace Formz\Element;

class Basic {

	// Basic field attributes
	public $name = '';
	public $type = null;
	public $attributes = array();
	public $default = '';

	// New field needs name (type is kinda optional)
	public function __construct($name, $type = 'text'){
		$this->name = $name;
		$this->type = $type;
	}

	/**
	 * render form element
	 *
	 * @param show true|false - output directly to screen instead of returning (false = default)
	 * @return form markup 
	 */
	public function render($show = false){
		$markup = $this->build();

		// If show is true, output html
		if($show) echo $markup;

		return $markup;
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
	 * set attributes value (can be overwritten by Form::populate();)
	 *
	 * @param $attrs array of attributes ('id'=>'bla')
	 * @return FormElement
	 */
	public function attributes($attrs = array()){
		$this->attributes = $attrs;
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

	/**
	 * get element value
	 */
	protected function getValue(){

		$val = false;
		// get val
		if(\Formz\Form::$autoPopulate && isset(\Formz\Form::$values[$this->name])){
			$val = \Formz\Form::$values[$this->name];
		}elseif($this->default !== ''){
			$val = $this->default;
		}

		// Don't trust the value, as it could be direct from $_POST
		return htmlspecialchars($val);
	}

	/**
	 * Convert attributes to string
	 */
	protected function attributesToString(){
		$string = '';

		foreach($this->attributes as $key => $value){
			$string .=" {$key}='{$value}'";
		}

		return $string;
	}

}