<?php

namespace formz\Element;

class Element {

	// Basic field attributes
	public $attributes = array();

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
	 * set attributes value (can be overwritten by Form::populate();)
	 *
	 * @param $attrs array of attributes ('id'=>'bla') or string
	 * @return FormElement
	 */
	public function attributes($attrs = array()){
		$this->attributes = $attrs;
		return $this;
	}

	/**
	 * set id value
	 *
	 * @param $id string - Id of element
	 * @return FormElement
	 */
	public function id($id){
		$this->id = $id;
		return $this;
	}

	/**
	 * set class value 
	 *
	 * @param $class string of class names
	 * @return FormElement
	 */
	public function classes($class){
		$this->classes = $class;
		return $this;
	}

	/**
	 * generate element markup
	 */
	protected function build(){
		return "";
	}

	/**
	 * Convert attributes to string
	 */
	protected function attributesToString(){
		// Get class & id markup
		$class = ($this->classes == '') ? '' : "class='{$this->classes}' ";
		$id = ($this->id == '') ? '' : "id='{$this->id}' ";

		// Set in to attributes
		$attributes = $id.$class;

		// extract $this->attributes
		if(is_array($this->attributes)){
			// Add each attribute to string
			foreach($this->attributes as $key => $value){
				$attributes .=" {$key}='{$value}'";
			}
		}else{
			// string = add directly
			$attributes .= $this->attributes;
		}

		return $attributes;
	}

}