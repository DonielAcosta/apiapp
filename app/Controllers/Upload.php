<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Files\File;

class Upload extends ResourceController{

    protected $modelName = null;
    protected $format = 'json';

    public function index(){
        return $this->respond(['message' => 'API endpoint for uploading images'], 200);
    }

    public function upload(){
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[userfile,100]',
                    'max_dims[userfile,1024,768]',
                ],
            ],
        ];

        if (! $this->validate($validationRule)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $img = $this->request->getFile('userfile');

        if (! $img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();
            $data = ['uploaded_fileinfo' => new File($filepath)];

            return $this->respond($data, 200);
        }

        return $this->failServerError('Failed to process the image.');
    }
}

