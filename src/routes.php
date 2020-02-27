<?php

// use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

// return function (App $app) {    

    $container = $app->getContainer();
    
    //Route to Index Page 
    $app->get('/leads/[{origem}]', function (Request $request, Response $response, array $args) use ($container) {
        
        $container->get('logger')->info("Slim-Skeleton '/' route");
        
        $this->renderer->render($response, 'header.phtml'); 
        $this->renderer->render($response, 'content.phtml', $args); 
        $this->renderer->render($response, 'footer.phtml'); 
    });

    $app->get('/users', function (Request $request, Response $response, $args) use ($container) {
        
        $table = $this->db->table('users'); 
        $users = $table->get();         
        $this->renderer->render($response, 'header.phtml'); 
        $this->renderer->render($response, 'users/index.phtml', ['users' => $users]);         
        $this->renderer->render($response, 'footer.phtml'); 
    })->add($auth); 


    $app->post('/users', function (Request $request, Response $response, $args) use ($container) {
        $data = [
            'name' => filter_input(INPUT_POST, 'name'),
            'email' => filter_input(INPUT_POST, 'email'),
            'password' => filter_input(INPUT_POST, 'password')
        ];         

        $table = $this->db->table('users'); 
        $users = $table->insert($data);         

        return $response->withStatus(302)->withHeader('Location', '/users');         

    })->add($auth); 

    $app->get('/users/{id}', function (Request $request, Response $response, $args) use ($container) {
        $id = $args['id']; 
        $table = $this->db->table('users'); 
        $users = $table->where('id', $id)->delete();         

        return $response->withStatus(302)->withHeader('Location', '/users');         

    })->add($auth); 

    $app->map(['GET','POST'], '/login', function (Request $request, Response $response, $args) use ($container) {
        $this->renderer->render($response, 'header.phtml');         
        $this->renderer->render($response, 'login.phtml');         
        $this->renderer->render($response, 'footer.phtml');        

    }); 

    $app->get('/home', \Controllers\HomeController::class . ':index'); 
    
// };
