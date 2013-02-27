<?php

namespace Cabbuccino\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Travel
 *
 * @ORM\Table(name ="travel")
 * @ORM\Entity(repositoryClass="Cabbuccino\UserBundle\Entity\TravelRepository")
 */
class Travel
{
    /**
     * @var integer
     *
     * @ORM\Column(name ="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToMany(targetEntity="Subscription", mappedBy="travel_id")
     */
    protected $subscriptions;

    /**
     * @var integer
     *
     * @ORM\Column(name="departure", type="integer")
     */
    private $departure;

    /**
     * @var integer
     *
     * @ORM\Column(name="arrival", type="integer")
     */
    private $arrival;


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
     * Set departure
     *
     * @param integer $departure
     * @return Travel
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;
    
        return $this;
    }

    /**
     * Get departure
     *
     * @return integer 
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * Set arrival
     *
     * @param integer $arrival
     * @return Travel
     */
    public function setArrival($arrival)
    {
        $this->arrival = $arrival;
    
        return $this;
    }

    /**
     * Get arrival
     *
     * @return integer 
     */
    public function getArrival()
    {
        return $this->arrival;
    }
    
        public function __construct()
	{
		$this->departure=0;
		$this->arrival=0;
	}
	
	/**
     *
     * @return array 
     */
	public function asMobileObject(){
		$result = array();
        $result["id"]=$this->getId();
        $result["departure"]=$this->getDeparture();
        $result["arrival"]=$this->getArrival();
        return $result;
	}
}
