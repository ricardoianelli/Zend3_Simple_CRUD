<?php

namespace Usuario\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

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
        return new ViewModel();
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