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
    return $router->app->version();
});

$router->group(['middleware' => 'client.credentials'], function () use ($router) {

    $router->get('/books', 'Book2Controller@index'); // Get all books from Books Service
    $router->post('/books', 'Book2Controller@add'); // Create a new book from Books Service
    $router->get('/books/{id}', 'Book2Controller@show'); // Get the book info based on book id from Books Service
    $router->put('/books/{id}', 'Book2Controller@update'); // Update a book record based on book id from Books Service
    $router->delete('/books/{id}', 'Book2Controller@delete'); // Delete a book record based on book id from Books Service

    $router->get('/authors', 'Author2Controller@index'); // Get all authors from Authors Service
    $router->post('/authors', 'Author2Controller@add'); // Create a new author from Authors Service
    $router->get('/authors/{id}', 'Author2Controller@show'); // Get the author info based on author id from Authors Service
    $router->put('/authors/{id}', 'Author2Controller@update'); // Update a author record based on author id from Authors Service
    $router->delete('/authors/{id}', 'Author2Controller@delete'); // Delete author record based on author id from Authors Service
});
