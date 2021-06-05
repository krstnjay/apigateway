<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\Author2Service;
use App\Traits\ApiResponser;

class Author2Controller extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the Book1 Microservice
     * @var Author2Service
     */
    public $author2Service;
    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(Author2Service $author2Service)
    {
        $this->author2Service = $author2Service;
    }

    /**
     * Return the list of authors
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->author2Service->obtainAuthors()); 
    }
    public function add(Request $request)
    {
        return $this->successResponse($this->author2Service->createAuthor($request->all(),Response::HTTP_CREATED));
    }
    /**
     * Obtains and show one authors
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->successResponse($this->author2Service->obtainAuthor($id));
    }
    /**
     * Update an existing author
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->author2Service->editAuthor($request->all(), $id));
    }
    /**
     * Remove an existing authors
     * @return Illuminate\Http\Response
     */
    public function delete($id)
    {
        return $this->successResponse($this->author2Service->deleteAuthor($id));
    }
}
