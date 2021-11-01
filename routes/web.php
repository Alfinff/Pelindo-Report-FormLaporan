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

$router->get('/', function () use ($router) {
    echo 'API Pelindo Report - Form Laporan';
});

$router->get('/tesdb', function () use ($router) {
    // Test database connection
    try {
        // DB::connection()->getPdo();
        if(DB::connection()->getDatabaseName())
        {
            echo "conncted sucessfully to database ".DB::connection()->getDatabaseName();
        } else {
            echo 'no';
        }
    } catch (\Exception $e) {
        die("Could not connect to the database.  Please check your configuration. error:" . $e );
    }
});

$router->group(['prefix' => 'superadmin', 'middleware' => ['jwt.auth', 'role.superadmin']], function() use ($router) {
    // crud form
    $router->group(['prefix' => 'form'], function() use ($router) {
        $router->get('/', 'FormController@index');
        $router->get('/cctv', 'FormController@formCCTV');
        $router->get('/cleaning', 'FormController@formCLEANING');
        $router->get('/facilities', 'FormController@formFACILITIES');
        $router->get('/{id}', 'FormController@show');
        // $router->put('/{id}', 'FormController@update');
    });

});

$router->group(['prefix' => 'supervisor', 'middleware' => ['jwt.auth', 'role.supervisor']], function() use ($router) {
    
});

$router->group(['prefix' => 'eos', 'middleware' => ['jwt.auth', 'role.eos']], function() use ($router) {
    $router->group(['prefix' => 'form'], function() use ($router) {
        $router->get('/', 'FormController@index');
        $router->get('/cctv', 'FormController@formCCTV');
        $router->get('/cleaning', 'FormController@formCLEANING');
        $router->get('/facilities', 'FormController@formFACILITIES');
        $router->get('/{id}', 'FormController@show');
    });
});
