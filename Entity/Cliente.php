<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="clientes")
 * @ORM\Entity
 */
class Cliente implements JsonSerializable
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
     * @var string
     *
     * @ORM\Column(name="nif", type="string", length=15, nullable=false,unique=true)
     */
    private $NIF;


    /**
     * @var string
     *
     * @ORM\Column(name="codigopostal", type="string", length=9, nullable=false)
     */
    private $codigoPostal;


    /**
     * @var string
     *
     * @ORM\Column(name="razonsocial", type="string", length=90, nullable=false)
     */
    private $razonsocial;


    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=90, nullable=false)
     */
    private $direccion;


    /**
     * @var string
     *
     * @ORM\Column(name="poblacion", type="string", length=90, nullable=false)
     */
    private $poblacion;


    /**
     * @var string
     *
     * @ORM\Column(name="provincia", type="string", length=90, nullable=false)
     */
    private $provincia;


    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=120, nullable=false)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="integer", length=16, nullable=false)
     */
    private $telefono;

    function __construct($nif, $cp, $razsoc, $dir, $pob, $prov, $correo, $telf)
    {
        $this->NIF = $nif;
        $this->codigoPostal = $cp;
        $this->razonsocial = $razsoc;
        $this->direccion = $dir;
        $this->poblacion = $pob;
        $this->provincia = $prov;
        $this->correo = $correo;
        $this->telefono = $telf;
    }

    public function updateSelf($nif, $cp, $razsoc, $dir, $pob, $prov, $correo, $telf)
    {
        $this->NIF = $nif;
        $this->codigoPostal = $cp;
        $this->razonsocial = $razsoc;
        $this->direccion = $dir;
        $this->poblacion = $pob;
        $this->provincia = $prov;
        $this->correo = $correo;
        $this->telefono = $telf;
    }

    public function jsonSerialize()
    {
        return ["id" => $this->id, "NIF" => $this->NIF, "codigoPostal" => $this->codigoPostal, "razonsocial" => $this->razonsocial, "direccion" => $this->direccion, "poblacion" => $this->poblacion, "provincia" => $this->provincia, "correo" => $this->correo, "telefono" => $this->telefono];
    }
}
