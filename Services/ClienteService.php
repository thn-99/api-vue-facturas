<?php
require_once __DIR__.'/../Repository/ClienteRepository.php';

class ClienteService{
    
    private $clienteRepository;
    private $entity;
    function __construct()
    {
        $this->clienteRepository= new ClienteRepository();
    }

    public function getAllClientes(){
        $this->clienteRepository;
    }
}
