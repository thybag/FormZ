<?php

namespace formz\Element;

class Radiobutton extends Select{
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
		return  $this->optionsToString();
	}

	/**
	 * Convert options to string + select active
	 */
	protected function optionsToString(){
		
		$attributes = $this->attributesToString();
		$selected = $this->getValue();
		$html = '';

		foreach($this->options as $value => $label){
			$html .= "<label {$attributes}> <input type='radio' name='{$this->name}' value='{$value}' ".(($value == $selected && $selected !== null) ? "checked='checked'" :"" )." /> {$label} </label>\n";
		}

		return $html;
	}
}
