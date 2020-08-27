<?php

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

$router->get('/', function ()  {
    return view('app');
});

$router->group(['prefix' => 'api'], function ($router) {
    $router->get('/utils/states', 'UtilsController@getStatesList');
    $router->post('/utils/mixed', 'UtilsController@getMixedString');
    $router->get('/utils/uuid', 'UtilsController@getUUID');
    $router->get('/states/list', 'WizardController@getStatesList');

});

/*$router->get('/{route:.*}/', function ()  {
    return view('app');
});*/
