<?php

namespace Cabbuccino\ApiBundle\Controller;


use Symfony\Component\HttpFoundation\Response as Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SearchApiController extends ApiController
{
	/**
     * @Route("/search")
     * @Template()
     */

    public function searchAction()
    {
    
        $em = $this->getDoctrine()->getEntityManager();
        
        $qb = $em->createQueryBuilder();
        $qb ->add('select','u')
            ->add('from','CabbuccinoUserBundle:Travel u')
            ->add('where','u.departure=:dep AND u.arrival=:arr');
        
        $qb->setParameter('dep',2);
        $qb->setParameter('arr',2);
            
        $query = $qb->getQuery();
        $travel = $query->getResult();
        
        $this->setResponseData($travel);    
        return $this->renderResponse();
        
    }
  
}