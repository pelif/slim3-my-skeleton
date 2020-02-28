<?php

$container = $app->getContainer();
      
$app->get('/users', '\Controllers\UserController:index');    
$app->post('/users', '\Controllers\UserController:create'); 
$app->get('/users/{id}', '\Controllers\UserController:remove'); 
$app->map(['GET','POST'], '/login', '\Controllers\LoginController:index'); 

    
    

