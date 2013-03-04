<?php

namespace Cabbuccino\ApiBundle\Controller;


use Cabbuccino\UserBundle\Entity\Travel;
use Cabbuccino\UserBundle\Entity\Subscription;
use Symfony\Component\HttpFoundation\Response as Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SearchApiController extends ApiController
{
	/**
     * @Route("/search/id={userId}/dep={dep}/arr={arr}")
     * @Template()
     */

    public function searchAction($dep,$arr,$userId)
    {
        $postedTravel = $this->searchTravel($dep,$arr);
        
        if (sizeof($postedTravel)==0){
        	$travel = $this->createTravel($dep,$arr);
        	$subscription = $this->createSubscription($travel->getId(),$userId);
        }
        
        else{
        	$travel = $postedTravel[0];
        	$subscription = $this->createSubscription($travel,$this->searchUser($userId));
        }
        
        return new Response(json_encode($travel->asMobileObject()));
    }
    
    public function createTravel($dep,$arr){
  		$travel = new Travel();
  		$travel->setDeparture($dep);
  		$travel->setArrival($arr);
  		
  		$em = $this->getDoctrine()->getManager();
    	$em->persist($travel);
    	$em->flush();
    	
    	return $travel;
  		
  	}
  	
  	public function createSubscription($travel,$user){
  		$subscription = new Subscription();
  		$subscription->setTravelId($travel);
  		$subscription->setUserId($user);
  		
  		$em = $this->getDoctrine()->getManager();
    	$em->persist($subscription);
    	$em->flush();
    	
    	return $subscription;
  		
  	}
  
    public function searchTravel($departure,$arrival){
    	
    	$em = $this->getDoctrine()->getEntityManager();
        
        $qb = $em->createQueryBuilder();
        $qb ->add('select','u')
            ->add('from','CabbuccinoUserBundle:Travel u')
            ->add('where','u.departure=:dep AND u.arrival=:arr');
        
        $qb->setParameter('dep',$departure);
        $qb->setParameter('arr',$arrival);
        
        $query = $qb->getQuery();
        $travels = $query->getResult();
        
        return $this->availableTravel($travels);
    }
    
    public function availableTravel($travels){

    	$em = $this->getDoctrine()->getEntityManager();
  	
    	$qb = $em->createQueryBuilder();
        $qb ->add('select','s')
            ->add('from','CabbuccinoUserBundle:Subscription s')
            ->add('where','s.travel_id=:travelId');
    	
    	$availableTravel=array();
    	
    	for ($i=0; $i<sizeof($travels) ; $i++){
    		$travel = $travels[$i];
    		$qb->setParameter('travelId',$travel->getId());
    		$query = $qb->getQuery();
    		$subscriptionsLinkedToTravel= $query->getResult();
    		if (sizeOf($subscriptionsLinkedToTravel)<3){
    			$availableTravel[sizeOf($availableTravel)] = $travel;
    		}
    	}
    	
    	return $availableTravel;
    }
    
    public function searchUser($id){
    	$em = $this->getDoctrine()->getEntityManager();
        
        $qb = $em->createQueryBuilder();
        $qb ->add('select','u')
            ->add('from','CabbuccinoUserBundle:User u')
            ->add('where','u.id=:id');
        
        $qb->setParameter('id',$id);
        $query = $qb->getQuery();
        $user = $query->getSingleResult();
        
        return $user;
    }
    
    
}