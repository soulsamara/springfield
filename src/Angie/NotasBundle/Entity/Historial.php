<?php

namespace Angie\NotasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historial
 *
 * @ORM\Table(name="historial")
 * @ORM\Entity(repositoryClass="Angie\NotasBundle\Repository\HistorialRepository")
 */
class Historial
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_historial", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
     * @var string
     *
     * @ORM\Column(name="fecha", type="string")

     */
    private $fecha;

     /**
     * @var string
     *
     * @ORM\Column(name="accion_realizada", type="string")

     */
    private $accion_realizada;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

  

    /**
     * Set accionRealizada
     *
     * @param string $accionRealizada
     *
     * @return Historial
     */
    public function setAccionRealizada($accionRealizada)
    {
        $this->accion_realizada = $accionRealizada;

        return $this;
    }

    /**
     * Get accionRealizada
     *
     * @return string
     */
    public function getAccionRealizada()
    {
        return $this->accion_realizada;
    }

    /**
     * Set fecha
     *
     * @param string $fecha
     *
     * @return Historial
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return string
     */
    public function getFecha()
    {
        return $this->fecha;
    }
}
