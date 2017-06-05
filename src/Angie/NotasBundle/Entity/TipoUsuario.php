<?php

namespace Angie\NotasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoUsuario
 *
 * @ORM\Table(name="tipo_usuario")
 * @ORM\Entity(repositoryClass="Angie\NotasBundle\Repository\TipoUsuarioRepository")
 */
class TipoUsuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tipo_usuario", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string",  length=255)
     */
    private $nombre;


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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return TipoUsuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }
}
