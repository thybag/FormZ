<?php

namespace formz\Element;

class Select extends Input{
	// Options array
	public $options = array();

	/**
	 * set list of options for selectbox
	 *
	 * @param $options array ('value'=>'label')
	 * @return FormElement
	 */
	public function options($options = array()){
		$this->options = $options;
		return $this;
	}

	/**
	 * generate element markup
	 */
	protected function build(){
		$attributes = $this->attributesToString();
		$options = $this->optionsToString();

		return "<select name='{$this->name}' {$attributes} >\n".$options."</select>";
	}

	/**
	 * Convert options to string + select active
	 */
	protected function optionsToString(){
		$html = '';
		$selected = $this->getValue();

		foreach($this->options as $value => $label){
			$html .= "<option value='{$value}' ". (($value == $selected && $selected !== null) ? "selected='selected'" :"" ) .">{$label}</option>\n";
		}

		return $html;
	}
}
