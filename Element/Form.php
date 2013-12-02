<?php

namespace formz\Element;

class Form extends Element {

	public $method = '';
	public $action = '';

	public $open;

	public function __construct($open, $action=''){
		$this->open = $open;
		$this->action = $action;
	}

	public function method($method = 'POST'){
		$this->method = $method;
		return $this;
	}

	public function action($url){
		$this->action = $action;
		return $this;
	}

	/**
	 * generate element markup
	 */
	protected function build(){

		if(!$this->open) return "</form>";


		$attributes = $this->attributesToString();

		return "<form action='{$this->action}' method='{$this->method}' {$attributes} >";
	}

}