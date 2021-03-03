<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * Factura
 *
 * @ORM\Table(name="facturas")
 * @ORM\Entity
 */
class Factura implements JsonSerializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var int
     *
     * @ORM\Column(name="tipo", type="integer",nullable=false)
     */
    private $tipo;


    /**
     * @var string
     *
     * @ORM\Column(name="nif", type="string", length=15, nullable=false)
     */
    private $NIF;


    /**
     * @var DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;


    /**
     * @var string
     *
     * @ORM\Column(name="concepto", type="string", length=90, nullable=false)
     */
    private $concepto;


    /**
     * @var double
     *
     * @ORM\Column(name="importe", type="float", nullable=false)
     */
    private $importe;


    /**
     * @var double
     *
     * @ORM\Column(name="iva", type="float", nullable=false)
     */
    private $iva;
    

    /**
     * @ManyToOne(targetEntity="Cliente", inversedBy="facturas")
     * @JoinColumn(name="id", referencedColumnName="id")
     */
    private $cliente;


    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function jsonSerialize()
    {
        return ["id" => $this->id, "NIF" => $this->NIF, "tipo" => $this->tipo, "fecha" => $this->fecha, "concepto" => $this->concepto, "importe" => $this->importe, "iva" => $this->iva];
    }
   
}
