<?php

namespace Cabbuccino\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subscription
 *
 * @ORM\Table(name ="subscription")
 * @ORM\Entity(repositoryClass="Cabbuccino\UserBundle\Entity\SubscriptionRepository")
 */
class Subscription
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Travel", inversedBy="subscriptions")
     * @ORM\JoinColumn(name="travel_id", referencedColumnName="id")
     */
    private $travel_id;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="User", inversedBy="subscriptions")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user_id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->subscriptionId;
    }

    /**
     * Set travel_id
     *
     * @param integer $travelId
     * @return Subscription
     */
    public function setTravelId($travelId)
    {
        $this->travel_id = $travelId;
    
        return $this;
    }

    /**
     * Get travel_id
     *
     * @return integer 
     */
    public function getTravelId()
    {
        return $this->travel_id;
    }

    /**
     * Set user_id
     *
     * @param integer $userId
     * @return Subscription
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;
    
        return $this;
    }

    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    
    public function __construct()
{
	$this->user_id=0;
	$this->travel_id=0;
}
}

