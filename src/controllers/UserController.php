<?php 

namespace Controllers;

use Models\Users;
use Psr\Container\ContainerInterface; 
use Slim\Http\Request;
use Slim\Http\Response;

class UserController 
{
    protected $container;     
    protected $render; 

    public function __construct(ContainerInterface $container) {
        $this->container = $container;             
        $this->render = $this->container->get('renderer');         
    }

    public function index(Request $request, Response $response, $args) {
        $users = ['users' => Users::all()];

        $this->render->render($response, 'header.phtml'); 
        $this->render->render($response, 'users/index.phtml', $users); 
        $this->render->render($response, 'footer.phtml'); 
    }

    public function create(Request $request, Response $response, $args) {
        $data = [
            'name' => filter_input(INPUT_POST, 'name'),
            'email' => filter_input(INPUT_POST, 'email'),
            'password' => filter_input(INPUT_POST, 'password')
        ];      

        $user = new Users($data); 
        $user->save(); 

        return $response->withStatus(302)->withHeader('Location', '/users'); 
    }

    public function remove(Request $request, Response $response, $args) {
        $id = $args['id']; 
        $user = Users::find($id);         
        $user->delete(); 

        return $response->withStatus(302)->withHeader('Location', '/users'); 
    }


}