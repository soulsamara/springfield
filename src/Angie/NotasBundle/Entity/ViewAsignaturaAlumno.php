<?php

namespace Angie\NotasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViewAsignaturaAlumno
 *
 * @ORM\Table(name="view_asignatura_alumno")
 * @ORM\Entity(repositoryClass="Angie\NotasBundle\Repository\AsignaturaAlumnoRepository")
 */
class ViewAsignaturaAlumno
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_asignatura_alumno", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_asignatura", type="integer")
     */
    private $id_asignatura;

    /**
     * @var int
     *
     * @ORM\Column(name="id_alumno", type="integer")
     */
    private $id_alumno;

    /**
     * @var string
     *
     * @ORM\Column(name="alumno", type="string")
     */
    private $alumno;

    /**
     * @var string
     *
     * @ORM\Column(name="asignatura", type="string")
     */
    private $asignatura;


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
     * Set idAsignatura
     *
     * @param integer $idAsignatura
     *
     * @return ViewAsignaturaAlumno
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

    /**
     * Set idAlumno
     *
     * @param integer $idAlumno
     *
     * @return ViewAsignaturaAlumno
     */
    public function setIdAlumno($idAlumno)
    {
        $this->id_alumno = $idAlumno;

        return $this;
    }

    /**
     * Get idAlumno
     *
     * @return integer
     */
    public function getIdAlumno()
    {
        return $this->id_alumno;
    }


    /**
     * Get asignatura
     *
     * @return \Angie\NotasBundle\Entity\Asignatura
     */
    public function getAsignatura()
    {
        return $this->asignatura;
    }



    /**
     * Get alumno
     *
     * @return \Angie\NotasBundle\Entity\Usuario
     */
    public function getAlumno()
    {
        return $this->alumno;
    }
}
