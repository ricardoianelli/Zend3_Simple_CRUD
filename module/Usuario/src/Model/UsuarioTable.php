<?php

namespace Usuario\Model;

use Zend\Db\TableGateway\TableGatewayInterface;
use RuntimeException;

class UsuarioTable
{
    private $tableGateway;
    
    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getAll()
    {
        return $this->tableGateway->select();
    }

    public function getUsuario($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (!$row) {
            throw new RuntimeException(sprintf('Não foi encontrado o id %d', $id));
        }
        return $row;
    }

    public function salvarUsuario(Usuario $usuario)
    {
        $data = [
            'nome' => $usuario->getNome(),
            'sobrenome' => $usuario->getSobrenome(),
            'email' => $usuario->getEmail(),
            'situacao' => $usuario->getSituacao(),
        ];

        $id = (int) $usuario->getId();
        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }
        
        $this->tableGateway->update($data, ["id" => $id]);
    }

    public function deletarUsuario($id)
    {
        $this->tableGateway->delete(["id" => (int)$id]);
    }
}