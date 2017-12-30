<?php
namespace Crud\Form;

use Zend\Form\Form;

/**
 * This form is used to collect user feedback data like user E-mail, 
 * message subject and text.
 */
class EditForm extends Form
{
  // Constructor.   
  public function __construct()
  {
    // Define form name
    parent::__construct('contact-form');

    // Set POST method for this form
    $this->setAttribute('method', 'post');
        	
    // Add form elements
    $this->addElements();    
  }
    
  // This method adds elements to form (input fields and 
  // submit button).
  private function addElements() 
  {
    // Add "email" field
    $this->add([
	        'type'  => 'text',
            'name' => 'name',
            'attributes' => [                
                'id' => 'name',
            ],
            'options' => [
                'label' => 'Your Name',
            ],
        ]);
        
    // Add "subject" field
    $this->add([
            'type'  => 'text',
            'name' => 'company',
            'attributes' => [
              'id' => 'company'  
            ],
            'options' => [
                'label' => 'Company',
            ],
        ]);
        
    
        
    // Add the submit button
    $this->add([
            'type'  => 'submit',
            'name' => 'submit',
            'attributes' => [                
                'value' => 'Submit',
            ],
        ]);
    }        
}