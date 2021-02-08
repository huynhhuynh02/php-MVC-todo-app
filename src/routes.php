<?php
    use NalSolution\App\Router;
    /**
     * web router
     */
    Router::get('/','NalSolution\Controllers\HomeController@index');
    Router::get('/add','NalSolution\Controllers\HomeController@create');
    Router::post('/add','NalSolution\Controllers\HomeController@store');
    Router::get('/update/(:num)','NalSolution\Controllers\HomeController@show');
    Router::post('/update','NalSolution\Controllers\HomeController@update');
    Router::get('/delete/(:num)','NalSolution\Controllers\HomeController@delete');
    Router::get('/calendar','NalSolution\Controllers\CalendarController@index');
    // api router
    Router::get('/api/calendar','NalSolution\Controllers\API\HomeController@index');
    Router::dispatch();
?>