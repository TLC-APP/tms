<div id="contactStatus"></div>
<?php

echo $this->Form->create('Contacts', array('default' => false));
// default = false sets the submit button not to submit
// so we can use AJAX. Still works for users w/o javascript
echo $this->Form->input('Contacts.name');
echo $this->Form->input('Contacts.email');
echo $this->Form->input('Contacts.message');
echo $this->Form->end('Submit');
?>

<?php

// JsHelper should be loaded in $helpers in controller
// Form ID: #ContactsContactForm
// Div to use for AJAX response: #contactStatus

$data = $this->Js->get('#ContactsContactForm')->serializeForm(array('isForm' => true, 'inline' => true));
$this->Js->get('#ContactsContactForm')->event(
        'submit', $this->Js->request(
                array('action' => 'contact', 'controller' => 'contacts'), array(
            'update' => '#contactStatus',
            'data' => $data,
            'async' => true,
            'dataExpression' => true,
            'method' => 'POST'
                )
        )
);
echo $this->Js->writeBuffer();
?>