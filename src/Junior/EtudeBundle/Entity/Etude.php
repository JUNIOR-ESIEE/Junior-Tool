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
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $company;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $zipcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

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
    private $commercialEnrollmentOpen = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $studentsEnrollmentOpen = false;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $rbu;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $student;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $commercial;

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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Etude
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Etude
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Etude
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Etude
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Etude
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Etude
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zipcode
     *
     * @param string $zipcode
     *
     * @return Etude
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Etude
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
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
     * Set rbu
     *
     * @param \Application\Sonata\UserBundle\Entity\User $rbu
     *
     * @return Etude
     */
    public function setRbu(\Application\Sonata\UserBundle\Entity\User $rbu = null)
    {
        $this->rbu = $rbu;

        return $this;
    }

    /**
     * Get rbu
     *
     * @return \Application\Sonata\UserBundle\Entity\User
     */
    public function getRbu()
    {
        return $this->rbu;
    }

    /**
     * Set student
     *
     * @param \Application\Sonata\UserBundle\Entity\User $student
     *
     * @return Etude
     */
    public function setStudent(\Application\Sonata\UserBundle\Entity\User $student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \Application\Sonata\UserBundle\Entity\User
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set commercial
     *
     * @param \Application\Sonata\UserBundle\Entity\User $commercial
     *
     * @return Etude
     */
    public function setCommercial(\Application\Sonata\UserBundle\Entity\User $commercial = null)
    {
        $this->commercial = $commercial;

        return $this;
    }

    /**
     * Get commercial
     *
     * @return \Application\Sonata\UserBundle\Entity\User
     */
    public function getCommercial()
    {
        return $this->commercial;
    }
}
