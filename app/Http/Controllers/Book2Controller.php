<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\Book2Service;
use App\Services\Author2Service;
use App\Traits\ApiResponser;

class Book2Controller extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the Book Microservice
     * @var Book2Service
     */
    public $book2Service;
    public $author2Service;
    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(Book2Service $book2Service, Author2Service $author2Service)
    {
        $this->book2Service = $book2Service;
        $this->author2Service = $author2Service;
    }

    /**
     * Return the list of books
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->book2Service->obtainBooks()); 
    }
    public function add(Request $request)
    {
        $this->author2Service->obtainAuthor($request->authorid);
        return $this->successResponse($this->book2Service->createBook($request->all(),Response::HTTP_CREATED));
    }
    /**
     * Obtains and show one books
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->successResponse($this->book2Service->obtainBook($id));
    }
    /**
     * Update an existing books
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->author2Service->obtainAuthor($request->authorid);
        return $this->successResponse($this->book2Service->editBook($request->all(), $id));
    }
    /**
     * Remove an existing books
     * @return Illuminate\Http\Response
     */
    public function delete($id)
    {
        return $this->successResponse($this->book2Service->deleteBook($id));
    }
}
