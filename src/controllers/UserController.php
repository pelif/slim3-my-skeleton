<?php 

namespace Controllers;

use Models\Users;
use Psr\Container\ContainerInterface; 

class UserController 
{
    protected $container;     
    protected $render; 

    public function __construct(ContainerInterface $container) {
        $this->container = $container;             
        $this->render = $this->container->get('renderer');         
    }

    public function index($request, $response, $args) {
        $users = ['users' => Users::all()];

        $this->render->render($response, 'header.phtml'); 
        $this->render->render($response, 'users/index.phtml', $users); 
        $this->render->render($response, 'footer.phtml'); 

    }


}