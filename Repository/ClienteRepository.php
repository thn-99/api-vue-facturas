<?php
require_once __DIR__.'/../Entity/Cliente.php';
require_once __DIR__.'/../bootstrap.php';

class ClienteRepository{

    private $entity;

    function __construct()
    {
        $this->entity=getEntityManager();
    }
    
    public function getClienteByNif($nif){
        $query=$this->entity->createQuery('SELECT u FROM Cliente u WHERE u.NIF=:nif');
        $query->setParameter(":nif",$nif);
        return $query->getSingleResult();
    }

    public function deleteById($id){
        try{
            $cliente = $this->entity->find("Cliente",$id);
            $this->entity->remove($cliente);
            $this->entity->flush();
            echo true;
        }catch(Exception $e){
            echo $e->getMessage();
        }
        
    }

}
?>