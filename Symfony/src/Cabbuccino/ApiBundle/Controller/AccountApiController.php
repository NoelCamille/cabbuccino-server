<?php

namespace Cabbuccino\ApiBundle\Controller;


use Symfony\Component\HttpFoundation\Response as Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AccountApiController extends ApiController
{
	/**
     * @Route("/account")
     * @Template()
     */

    public function accountAction()
    {
        
        return new Response(0);
        
    }
  
}