<?php

namespace Junior\EtudeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="etude")
 */
class Etude
{
    const STATE_ABORTED             = 'state_aborted';
    const STATE_CLOSED              = 'state_closed';
    const STATE_WAITING_INFORMATION = 'state_waiting_information';
    const STATE_OPENED              = 'state_opened';
    const STATE_VALID               = 'state_valid';

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $deposit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $deadline;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $state;

    /**
     * @ORM\Column(type="boolean")
     */
    private $commercialEnrollmentOpen = true;

    /**
     * @ORM\Column(type="boolean")
     */
    private $studentsEnrollmentOpen = true;

    /**
     * @ORM\ManyToOne(targetEntity="Junior\EtudeBundle\Entity\Client")
     * @ORM\JoinColumn(nullable=true)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="Junior\EtudeBundle\Entity\Student")
     * @ORM\JoinColumn(nullable=true)
     */
    private $rbu;

    /**
     * @ORM\ManyToOne(targetEntity="Junior\EtudeBundle\Entity\Student")
     * @ORM\JoinColumn(nullable=true)
     */
    private $student;

    /**
     * @ORM\ManyToOne(targetEntity="Junior\EtudeBundle\Entity\Student")
     * @ORM\JoinColumn(nullable=true)
     */
    private $commercial;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media")
     * @ORM\JoinColumn(nullable=true)
     */
    private $scopeStatement;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media")
     * @ORM\JoinColumn(nullable=true)
     */
    private $graphicCharter;

    public function __construct()
    {
        $this->deposit = new \DateTime();
        $this->delay   = new \DateTime();
        $this->state   = Etude::STATE_WAITING_INFORMATION;
    }

    public function __toString()
    {
        return $this->title;
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
     * Set deposit
     *
     * @param \DateTime $deposit
     *
     * @return Etude
     */
    public function setDeposit($deposit)
    {
        $this->deposit = $deposit;

        return $this;
    }

    /**
     * Get deposit
     *
     * @return \DateTime
     */
    public function getDeposit()
    {
        return $this->deposit;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Etude
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Etude
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set deadline
     *
     * @param \DateTime $deadline
     *
     * @return Etude
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * Get deadline
     *
     * @return \DateTime
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Etude
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Get valid states
     *
     * @return array
     */
    public static function getStates()
    {
        return array(Etude::STATE_OPENED, Etude::STATE_WAITING_INFORMATION, Etude::STATE_ABORTED, Etude::STATE_CLOSED, Etude::STATE_VALID);
    }

    /**
     * Set commercialEnrollmentOpen
     *
     * @param boolean $commercialEnrollmentOpen
     *
     * @return Etude
     */
    public function setCommercialEnrollmentOpen($commercialEnrollmentOpen)
    {
        $this->commercialEnrollmentOpen = $commercialEnrollmentOpen;

        return $this;
    }

    /**
     * Get commercialEnrollmentOpen
     *
     * @return boolean
     */
    public function getCommercialEnrollmentOpen()
    {
        return $this->commercialEnrollmentOpen;
    }

    /**
     * Set studentsEnrollmentOpen
     *
     * @param boolean $studentsEnrollmentOpen
     *
     * @return Etude
     */
    public function setStudentsEnrollmentOpen($studentsEnrollmentOpen)
    {
        $this->studentsEnrollmentOpen = $studentsEnrollmentOpen;

        return $this;
    }

    /**
     * Get studentsEnrollmentOpen
     *
     * @return boolean
     */
    public function getStudentsEnrollmentOpen()
    {
        return $this->studentsEnrollmentOpen;
    }

    /**
     * Set client
     *
     * @param \Junior\EtudeBundle\Entity\Client $client
     *
     * @return Etude
     */
    public function setClient(\Junior\EtudeBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Junior\EtudeBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set rbu
     *
     * @param \Junior\EtudeBundle\Entity\Student $rbu
     *
     * @return Etude
     */
    public function setRbu(\Junior\EtudeBundle\Entity\Student $rbu = null)
    {
        $this->rbu = $rbu;

        return $this;
    }

    /**
     * Get rbu
     *
     * @return \Junior\EtudeBundle\Entity\Student
     */
    public function getRbu()
    {
        return $this->rbu;
    }

    /**
     * Set student
     *
     * @param \Junior\EtudeBundle\Entity\Student $student
     *
     * @return Etude
     */
    public function setStudent(\Junior\EtudeBundle\Entity\Student $student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \Junior\EtudeBundle\Entity\Student
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set commercial
     *
     * @param \Junior\EtudeBundle\Entity\Student $commercial
     *
     * @return Etude
     */
    public function setCommercial(\Junior\EtudeBundle\Entity\Student $commercial = null)
    {
        $this->commercial = $commercial;

        return $this;
    }

    /**
     * Get commercial
     *
     * @return \Junior\EtudeBundle\Entity\Student
     */
    public function getCommercial()
    {
        return $this->commercial;
    }

    /**
     * Set scopeStatement
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $scopeStatement
     *
     * @return Etude
     */
    public function setScopeStatement(\Application\Sonata\MediaBundle\Entity\Media $scopeStatement = null)
    {
        $this->scopeStatement = $scopeStatement;

        return $this;
    }

    /**
     * Get scopeStatement
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getScopeStatement()
    {
        return $this->scopeStatement;
    }

    /**
     * Set graphicCharter
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $graphicCharter
     *
     * @return Etude
     */
    public function setGraphicCharter(\Application\Sonata\MediaBundle\Entity\Media $graphicCharter = null)
    {
        $this->graphicCharter = $graphicCharter;

        return $this;
    }

    /**
     * Get graphicCharter
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getGraphicCharter()
    {
        return $this->graphicCharter;
    }
}
