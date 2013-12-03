<?php

namespace formz\Element;

class Checkbox extends Input{

	public $checked = false;
	public $value = 'on';

	/**
	 * generate element markup
	 */
	protected function build(){
		// get attributes
		$attributes = $this->attributesToString();

		// get value
		//$value = (!$value) ? '' : $this->getValue();

		$checked = ($this->checked) ? 'checked="checked"' : '';
		
		// create markup
		return "<input type='{$this->type}' value='{$this->value}' name='{$this->name}' {$attributes} {$checked}/>";
	}

	public function value($value){
		$this->value = $value;
		return $this;
	}

	public function check(){
		$this->checked = true;
		return $this;
	}
	public function uncheck(){
		$this->checked = false;
		return $this;
	}
}
