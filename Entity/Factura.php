<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * Factura
 *
 * @ORM\Table(name="facturas")
 * @ORM\Entity
 */
class Fatura
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
     * @ORM\Column(name="numerofactura", type="integer",nullable=false)
     */
    private $numeroFactura;

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
     * @ManyToOne(targetEntity="Cliente")
     * @JoinColumn(name="id", referencedColumnName="id")
     */
    private $cliente;
   
}
