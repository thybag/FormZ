<?php

namespace formz\Element;

class TextArea extends Input{

	/**
	 * generate element markup
	 */
	protected function build(){
		// get attributes
		$attributes = $this->attributesToString();

		// get value
		$value = $this->getValue();
		$value = (!$value) ? '' : $value;
		
		// create markup
		return "<textarea name='{$this->name}' {$attributes}>{$value}</textarea>";
	}
}
