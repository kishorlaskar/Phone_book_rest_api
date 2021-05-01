<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->post('/registration','RegistrationController@onRegistration');
$router->post('/login','LoginController@onLogin');

$router->post('/tokenTest',['middleware'=>'auth','uses'=>'LoginController@tokenTest']);

$router->post('/insert',['middleware'=>'auth','uses'=>'PhonebookdetailsController@onInsert']);
$router->post('/select',['middleware'=>'auth','uses'=>'PhonebookdetailsController@onSelect']);
$router->post('/delete',['middleware'=>'auth','uses'=>'PhonebookdetailsController@onDelete']);
$router->put('/update',['middleware'=>'auth','uses'=>'PhonebookdetailsController@onUpdate']);
