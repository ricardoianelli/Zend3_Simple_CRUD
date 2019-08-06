<?php

namespace Usuario\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Usuario\Form\UsuarioForm;

class UsuarioController extends AbstractActionController 
{
    private $table;

    public function __construct($table) 
    {
        $this->table = $table;
    }

    public function indexAction() 
    {
        return new ViewModel(["usuarios" => $this->table->getAll()]);
    }
    
    public function adicionarAction()
    {
        $form = new UsuarioForm();
        $form->get('submit')->setValue('Adicionar');
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return new ViewModel(['form' => $form]);
        }
        $usuario = new \Usuario\Model\Usuario();
        $form->setData($request->getPost());
        if (!$form->isValid()) {
            return new ViewModel(['form' => $form]);
        }
        $usuario->exchangeArray($form->getData());
        $this->table->salvarUsuario($usuario);
        return $this->redirect()->toRoute('usuario');
    }
    
    public function salvarAction()
    {
        return new ViewModel();
    }

    public function editarAction()
    {
        return new ViewModel();
    }

    public function removerAction()
    {
        return new ViewModel();
    }

    public function confirmacaoAction()
    {
        return new ViewModel();
    }
}