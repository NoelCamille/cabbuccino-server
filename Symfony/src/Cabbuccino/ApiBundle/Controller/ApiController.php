<?php

namespace Cabbuccino\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response as Response;

class ApiController extends Controller
{
  
  protected $response_data = array();
  
  protected function setResponseData($data)
  {
  	for($i=0; $i<sizeof($data) ; $i++){
		$this->response_data[$i] = $data[$i]->asMobileObject();
	}
  }
  
    
  protected function renderResponse()
  {
      header('Access-Control-Allow-Origin: *');
      return new Response(json_encode($this->response_data)); 
  }
    
}