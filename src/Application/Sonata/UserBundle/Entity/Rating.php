<?php

namespace Application\Sonata\UserBundle\Entity;

class Rating
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var integer
     */
    private $rating;

    /**
     * @var text
     */
    private $comment;

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     */
    private $commercial;

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     */
    private $student;

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
     * Set rating
     *
     * @param integer $rating
     *
     * @return Rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Rating
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set commercial
     *
     * @param \Application\Sonata\UserBundle\Entity\User $commercial
     *
     * @return Rating
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

    /**
     * Set student
     *
     * @param \Application\Sonata\UserBundle\Entity\User $student
     *
     * @return Rating
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
}
