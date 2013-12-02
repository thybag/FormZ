# FormZ

A Simple Stand-alone PHP Form Helper

## Installtion

FormZ can be installed via composer using:

    composer require thybag/formz:dev-master

Once composer has installed the library, simply include the standard composer autoloader in to your code.

    require 'vendor/autoload.php'

### Usage Examples

	// Make Form refers to formz/Form
	use formz\Form;

	//Open form
	Form::open("/somthing")->attributes(array("class"=>"test"))->render(true);

	// Create a required text field with default value of "bob"**
	Form::text("name")
	 	->attributes(array('required'=>'required'))
	 	->defaultValue("Bob")
	 	->render(true);
 
	// Select box with list of cows, css class cow_selector 
	// and default selection of Dexter**
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

	Form::close()->render(true);

You can have the form automatically populated from post data by calling the following before the form methods

	Form::populate($_POST);
