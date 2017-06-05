<?php

namespace Angie\NotasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Usuario
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Angie\NotasBundle\Repository\UserRepository")
 */
class Usuario 
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string",  length=255)
     */
    private $username;
    
    
    public function __construct()
    {
        parent::__construct();
    }

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
     * Get username
     *
     * @return string
    */
    
    public function getUsername()
    {
        return $this->username;
    }
     




}
