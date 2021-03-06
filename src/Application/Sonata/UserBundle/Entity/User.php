<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;

/**
 * This file has been generated by the Sonata EasyExtends bundle.
 *
 * @link https://sonata-project.org/bundles/easy-extends
 *
 * References :
 *   working with object : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/working-with-objects/en
 *
 * @author <yourname> <youremail>
 */
class User extends BaseUser
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var \Application\Sonata\UserBundle\Entity\Skill
     */
    private $skills;

    /**
     * @var \Application\Sonata\UserBundle\Entity\Rating
     */
    private $ratings;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $cv;

    /**
     * @var string
     */
    private $year;

    /**
     * @var boolean
     */
    private $isAvailable;

    /**
     * Get id
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add rating
     *
     * @param \Application\Sonata\UserBundle\Entity\Rating $rating
     *
     * @return User
     */
    public function addRating(\Application\Sonata\UserBundle\Entity\Rating $rating)
    {
        $this->ratings[] = $rating;

        return $this;
    }

    /**
     * Remove rating
     *
     * @param \Application\Sonata\UserBundle\Entity\Rating $rating
     */
    public function removeRating(\Application\Sonata\UserBundle\Entity\Rating $rating)
    {
        $this->ratings->removeElement($rating);
    }

    /**
     * Get ratings
     *
     * @return interger
     */
    public function getRatings()
    {
        return $this->ratings;
    }

    /**
     * Set cv
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $cv
     *
     * @return User
     */
    public function setCv(\Application\Sonata\MediaBundle\Entity\Media $cv = null)
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * Get cv
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * Add skill
     *
     * @param \Application\Sonata\UserBundle\Entity\Skill $skill
     *
     * @return User
     */
    public function addSkill(\Application\Sonata\UserBundle\Entity\Skill $skill)
    {
        $this->skills[] = $skill;

        return $this;
    }

    /**
     * Remove skill
     *
     * @param \Application\Sonata\UserBundle\Entity\Skill $skill
     */
    public function removeSkill(\Application\Sonata\UserBundle\Entity\Skill $skill)
    {
        $this->skills->removeElement($skill);
    }

    /**
     * Get skills
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set year
     *
     * @param string $year
     *
     * @return User
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set isAvailable
     *
     * @param boolean $isAvailable
     *
     * @return User
     */
    public function setIsAvailable($isAvailable)
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    /**
     * Get isAvailable
     *
     * @return boolean
     */
    public function getIsAvailable()
    {
        return $this->isAvailable;
    }

    public function getAverage()
    {
        $ratings = $this->getRatings();
        $nb = count($ratings);
        if($nb !== 0)
        {
            $total = 0;
            foreach ($ratings as $rating)
            {
                $total += $rating->getRating();
            }
            return round($total/$nb, 0, PHP_ROUND_HALF_UP);
        }
        return null;
    }
}
