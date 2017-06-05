<?php

namespace Angie\NotasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NotaSemestreAlumno
 *
 * @ORM\Table(name="nota_semestre_alumno")
 * @ORM\Entity(repositoryClass="Angie\NotasBundle\Repository\NotaSemestreAlumnoRepository")
 */
class NotaSemestreAlumno
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_nota", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="nota1", type="float")   
     */
    private $nota1;

     /**
     * @var float
     *
     * @ORM\Column(name="nota2", type="float")   
     */
    private $nota2;

     /**
     * @var float
     *
     * @ORM\Column(name="nota3", type="float")   
     */
    private $nota3;

    /**
     * @var int
     *
     * @ORM\Column(name="id_asignatura_alumno", type="integer")   
     */
    private $id_asignatura_alumno;


     /**
     * @var string
     *
     * @ORM\Column(name="semestre", type="string", length=25)   
     */
    private $semestre;

     
     /**
     * @var float
     *
     * @ORM\Column(name="promedio", type="float")   
     */
    private $promedio;


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
     * Set nota1
     *
     * @param float $nota1
     *
     * @return NotaSemestreAlumno
     */
    public function setNota1($nota1)
    {
        $this->nota1 = $nota1;

        return $this;
    }

    /**
     * Get nota1
     *
     * @return float
     */
    public function getNota1()
    {
        return $this->nota1;
    }

    /**
     * Set nota2
     *
     * @param float $nota2
     *
     * @return NotaSemestreAlumno
     */
    public function setNota2($nota2)
    {
        $this->nota2 = $nota2;

        return $this;
    }

    /**
     * Get nota2
     *
     * @return float
     */
    public function getNota2()
    {
        return $this->nota2;
    }

    /**
     * Set nota3
     *
     * @param float $nota3
     *
     * @return NotaSemestreAlumno
     */
    public function setNota3($nota3)
    {
        $this->nota3 = $nota3;

        return $this;
    }

    /**
     * Get nota3
     *
     * @return float
     */
    public function getNota3()
    {
        return $this->nota3;
    }

    /**
     * Set idAsignaturaAlumno
     *
     * @param integer $idAsignaturaAlumno
     *
     * @return NotaSemestreAlumno
     */
    public function setIdAsignaturaAlumno($idAsignaturaAlumno)
    {
        $this->id_asignatura_alumno = $idAsignaturaAlumno;

        return $this;
    }

    /**
     * Get idAsignaturaAlumno
     *
     * @return integer
     */
    public function getIdAsignaturaAlumno()
    {
        return $this->id_asignatura_alumno;
    }

    /**
     * Set semestre
     *
     * @param string $semestre
     *
     * @return NotaSemestreAlumno
     */
    public function setSemestre($semestre)
    {
        $this->semestre = $semestre;

        return $this;
    }

    /**
     * Get semestre
     *
     * @return string
     */
    public function getSemestre()
    {
        return $this->semestre;
    }

    /**
     * Set promedio
     *
     * @param float $promedio
     *
     * @return NotaSemestreAlumno
     */
    public function setPromedio($promedio)
    {
        $this->promedio = $promedio;

        return $this;
    }

    /**
     * Get promedio
     *
     * @return float
     */
    public function getPromedio()
    {
        return $this->promedio;
    }
}
