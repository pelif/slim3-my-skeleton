<?php 

namespace Controllers; 

use Psr\Container\ContainerInterface; 
use Models\Users; 
use Slim\Http\Request;
use Slim\Http\Response;

class HomeController 
{
    protected $container; 

    public function __construct(ContainerInterface $container) {
        $this->container = $container; 
    }

    public function index(Request $request, Response $response, $args) {        
        $users = Users::all();         
        
    }
}
