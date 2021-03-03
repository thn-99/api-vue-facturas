<?php
require_once __DIR__ . '/../Entity/Factura.php';
require_once __DIR__ . '/../Entity/Cliente.php';
require_once __DIR__ . '/../bootstrap.php';

class FacturaRepository
{
    private $em;

    public function __construct()
    {
        $this->em = getEntityManager();
    }

    public function deleteById($id)
    {
        try {
            $factura = $this->entity->find("Factura", $id);
            $this->entity->remove($factura);
            $this->entity->flush();
            echo true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function addToClient($clientId, $factura)
    {
        $cliente = $this->em->find("Cliente", $clientId);
        $facturasClietne = $cliente->getFacturas();
        $facturasClietne->add($factura);
        try {
            $this->em->persist($factura);
            $this->em->persist($cliente);
            $this->em->flush();
            return true;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
