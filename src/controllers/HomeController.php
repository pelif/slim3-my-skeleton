<?php 

namespace Controllers; 

use Psr\Container\ContainerInterface; 
use Models\Users; 

class HomeController 
{
    protected $container; 

    public function __construct(ContainerInterface $container) {
        $this->container = $container; 
    }

    public function index($request, $response, $args) {        
        $users = Users::all();         
        
    }
}
