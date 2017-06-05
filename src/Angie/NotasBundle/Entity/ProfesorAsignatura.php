<?php

namespace Angie\NotasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProfesorAsignatura
 *
 * @ORM\Table(name="profesor_asignatura")
 * @ORM\Entity(repositoryClass="Angie\NotasBundle\Repository\ProfesorAsignaturaRepository")
 */
class ProfesorAsignatura
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_profesor_asignatura", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
     * @var int
     *
     * @ORM\Column(name="id_profesor", type="integer")
     */
    private $id_profesor;

     /**
     * @var int
     *
     * @ORM\Column(name="id_asignatura", type="integer")
     */
    private $id_asignatura;


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
     * Set idProfesor
     *
     * @param integer $idProfesor
     *
     * @return ProfesorAsignatura
     */
    public function setIdProfesor($idProfesor)
    {
        $this->id_profesor = $idProfesor;

        return $this;
    }

    /**
     * Get idProfesor
     *
     * @return integer
     */
    public function getIdProfesor()
    {
        return $this->id_profesor;
    }

    /**
     * Set idAsignatura
     *
     * @param integer $idAsignatura
     *
     * @return ProfesorAsignatura
     */
    public function setIdAsignatura($idAsignatura)
    {
        $this->id_asignatura = $idAsignatura;

        return $this;
    }

    /**
     * Get idAsignatura
     *
     * @return integer
     */
    public function getIdAsignatura()
    {
        return $this->id_asignatura;
    }
}
