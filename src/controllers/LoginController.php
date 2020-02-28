<?php 

namespace Controllers; 

use Models\Users; 
use Psr\Container\ContainerInterface; 
use Slim\Http\Request;
use Slim\Http\Response;

class LoginController 
{
    protected $container; 
    protected $render; 

    public function __construct(ContainerInterface $container) {
        $this->container = $container; 
        $this->render = $this->container->get('renderer'); 
    }

    public function index(Request $request, Response $response, $args) {
        $this->render->render($response, 'header.phtml');         
        $this->render->render($response, 'login.phtml');         
        $this->render->render($response, 'footer.phtml');  
    }
}