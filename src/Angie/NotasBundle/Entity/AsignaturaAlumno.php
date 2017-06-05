<?php

namespace Angie\NotasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsignaturaAlumno
 *
 * @ORM\Table(name="asignatura_alumno")
 * @ORM\Entity(repositoryClass="Angie\NotasBundle\Repository\AsignaturaAlumnoRepository")
 */
class AsignaturaAlumno
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
     * @ORM\ManyToOne(targetEntity="Asignatura")
     * @ORM\JoinColumn(name="id_asignatura", referencedColumnName="id_asignatura")
     */
    private $asignatura;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="id_alumno", referencedColumnName="id")
     */
    private $alumno;

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
     * @return AsignaturaAlumno
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
     * @return AsignaturaAlumno
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
     * Set asignatura
     *
     * @param \Angie\NotasBundle\Entity\Asignatura $asignatura
     *
     * @return AsignaturaAlumno
     */
    public function setAsignatura(\Angie\NotasBundle\Entity\Asignatura $asignatura = null)
    {
        $this->asignatura = $asignatura;

        return $this;
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
     * Set alumno
     *
     * @param \Angie\NotasBundle\Entity\User $alumno
     *
     * @return AsignaturaAlumno
     */
    public function setAlumno(\Angie\NotasBundle\Entity\User $alumno = null)
    {
        $this->alumno = $alumno;

        return $this;
    }

    /**
     * Get alumno
     *
     * @return \Angie\NotasBundle\Entity\User
     */
    public function getAlumno()
    {
        return $this->alumno;
    }
}
