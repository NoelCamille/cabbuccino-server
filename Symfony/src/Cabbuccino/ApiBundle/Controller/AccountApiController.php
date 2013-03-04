<?php

namespace Cabbuccino\ApiBundle\Controller;


use Cabbuccino\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response as Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AccountApiController extends ApiController
{

	
	/**
     * @Route("/account/{name}")
     * @Template()
     */

    public function accountAction($name)
    {
        $id = $this->searchAccount($name);
        
        if($id>0){
        	return new Response(json_encode($id));
        } else {
        	$this->createAccount($name);
        }
    }
  	
  	public function searchAccount($name){
  		
  		$em = $this->getDoctrine()->getEntityManager();
        
        $qb = $em->createQueryBuilder();
        $qb ->add('select','u')
            ->add('from','CabbuccinoUserBundle:User u')
            ->add('where','u.username=:name');
        
        $qb->setParameter('name',$name);
        
        $query = $qb->getQuery();
        $user = $query->getResult();
        if(sizeof($user)>0){
        	return $user[0]->getId();
        } else {
        	return $this->createAccount($name)->getId();
        }
  	}
  	
  	public function createAccount($name){
  		$user = new User();
  		$user->setUsername($name);
  		$user->setUsernameCanonical($name);
  		$user->setEmail($name.'@gmail.com');
  		$user->setEmailCanonical($name.'@gmail.com');
  		$user->setPassword('iamyourfather');
  		$user->setPlainPassword('iamyourfather');
  		
  		$em = $this->getDoctrine()->getManager();
    	$em->persist($user);
    	$em->flush();
    	
    	return $user;
  		
  	}
  	
}