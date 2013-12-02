# FormZ

A Simple Stand-alone PHP Form Helper

## Usage Examples

**Create a required text field with default value of "bob"**

	 Form::text("name")
	 	->attributes(array('required'=>'required'))
	 	->defaultValue("Bob")
	 	->render(true);
 
**Select box with list of cows, css class cow_selector and default selection of Dexter**

	Form::select("cow")
		->options(array(
			'A' => 'Angus',
			'D' => 'Dexter',
			'J' => 'Jersey',
			'H' => 'Holstein'
		))
		->attributes(array('class'=> 'cow_selector'))
		->defaultValue('D')
		->render(true);

**Populate above fields from post values**

	Form::populate($_POST);
