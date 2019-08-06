<?php
namespace Usuario\Form;

use Zend\Form\Form;
use Zend\Form\Element as Element;

class UsuarioForm extends Form
{
    public function __construct()
    {
        parent::__construct('usuario', []);

        $this->add(new Element\Hidden('id'));
        $this->add(new Element\Text('nome', ['label' => 'Nome']));
        $this->add(new Element\Text('sobrenome', ['label' => 'Sobrenome']));
        $this->add(new Element\Text('email', ['label' => 'E-mail']));
        $this->add(new Element\Text('situacao', ['label' => 'Situação']));

        $submit = new Element\Submit('submit');
        $submit->setAttributes(['value' => 'Salvar', 'id' => 'submitbutton']);
        $this->add($submit);
    }
}

?>