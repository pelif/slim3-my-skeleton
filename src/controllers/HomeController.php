<?php 

namespace Controllers; 

use Psr\Container\ContainerInterface; 

class HomeController 
{
    protected $container; 

    public function __construct(ContainerInterface $container) {
        $this->container = $container; 
    }

    public function index($request, $response, $args) {
        return "This is my index page"; 
    }
}
