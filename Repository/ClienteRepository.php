<?php
require_once __DIR__.'/../Entity/Cliente';
require_once __DIR__.'/bootstrap.php';

class ClienteRepository{

    private $entity;

    public function getClientes(){
        $entity=getEntityManager();
        
    }

}
?>