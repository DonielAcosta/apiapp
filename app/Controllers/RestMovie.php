<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\MovieModel;
use CodeIgniter\RESTful\ResourceController;

class RestMovie extends ResourceController
{
    protected $modelName = 'App\Models\MovieModel';
    protected $format = 'json';
    public function index()
    {
        return $this->genericResponse($this->model->findAll(), NULL, 200);
    }
    public function show($id = NULL)
    {
        return $this->genericResponse($this->model->find($id), NULL, 200);
    }
    public function delete($id = NULL)
    {
        $movie = new MovieModel();
        $movie->delete($id);
        return $this->genericResponse("Producto eliminado", NULL, 200);
    }
    public function create()
    {
        $movie = new MovieModel();
        $category = new CategoryModel();
        if ($this->validate('movies')) {
            if (!$this->request->getPost('category_id'))                return $this->genericResponse(NULL, array("category_id" => "Categoría no existe"), 500);
            if (!$category->get($this->request->getPost('category_id'))) {
                return $this->genericResponse(NULL, array("category_id" => "Categoría no existe"), 500);
            }
            $id = $movie->insert(['title' => $this->request->getPost('title'),                'description' => $this->request->getPost('description'),                'category_id' => $this->request->getPost('category_id'),]);
            return $this->genericResponse($this->model->find($id), NULL, 200);
        }
        $validation = \Config\Services::validation();
        return $this->genericResponse(NULL, $validation->getErrors(), 500);
    }
    public function update($id = NULL)
    {
        $movie = new MovieModel();
        $category = new CategoryModel();
        $data = $this->request->getRawInput();
        if ($this->validate('movies')) {
            if (!$data['category_id'])                return $this->genericResponse(NULL, array("category_id" => "Categoría no existe"), 500);
            if (!$movie->get($id)) {
                return $this->genericResponse(NULL, array("movie_id" => "Película no existe"), 500);
            }
            if (!$category->get($data['category_id'])) {
                return $this->genericResponse(NULL, array("category_id" => "Categoría no existe"), 500);
            }
            $movie->update($id, ['title' => $data['title'],                'description' => $data['description'],                'category_id' => $data['category_id'],]);
            return $this->genericResponse($this->model->find($id), NULL, 200);
        }
        $validation = \Config\Services::validation();
        return $this->genericResponse(NULL, $validation->getErrors(), 500);
    }
    private function genericResponse($data, $msj, $code)
    {
        if ($code == 200) {
            return $this->respond(array("data" => $data,                "code" => $code)); //, 404, "No hay nada"        
        } else {
            return $this->respond(array("msj" => $msj,                "code" => $code));
        }
    }
}