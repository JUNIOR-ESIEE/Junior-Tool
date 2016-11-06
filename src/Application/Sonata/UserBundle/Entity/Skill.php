<?php

namespace Application\Sonata\UserBundle\Entity;

class Skill
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     */
    private $students;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->students = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Skill
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add student
     *
     * @param \Application\Sonata\UserBundle\Entity\User $student
     *
     * @return Skill
     */
    public function addStudent(\Application\Sonata\UserBundle\Entity\User $student)
    {
        $this->students[] = $student;

        return $this;
    }

    /**
     * Remove student
     *
     * @param \Application\Sonata\UserBundle\Entity\User $student
     */
    public function removeStudent(\Application\Sonata\UserBundle\Entity\User $student)
    {
        $this->students->removeElement($student);
    }

    /**
     * Get students
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudents()
    {
        return $this->students;
    }

    public function __toString()
    {
        return $this->name;
    }
}
