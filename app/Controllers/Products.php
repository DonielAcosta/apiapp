<?php
namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ProductModel;

class Products extends ResourceController
{
    use ResponseTrait;
    // get all product
    public function index()
    {
        $model = new ProductModel();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }
 
    // get single product
    public function show($id = null)
    {
        $model = new ProductModel();
        $data = $model->getWhere(['product_id' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }

    // create a product
    public function create()
    {
        $model = new ProductModel();

        // Obtener los datos del JSON enviado en la solicitud
        $json = $this->request->getJSON();
        $data = [
            'product_name' => $json->product_name,
            'product_price' => $json->product_price
        ];
        
        // Insertar los datos en la base de datos
        $model->insert($data);
        
        // Preparar la respuesta
        $response = [
            'status'   => 200,
            'error'    => true,
            'messages' => [
                'message' => 'Elemento creado exitosamente'
            ]
        ];

        return $this->respond($response, 200);
    }

    // create a product
    // public function create()
    // {
    //     $model = new ProductModel();
    //     $data = [
    //         'product_name' => $this->request->getPost('product_name'),
    //         'product_price' => $this->request->getPost('product_price')
    //     ];
    //     $model->insert($data);
    //     $response = [
    //         'status'   => 200,
    //         'error'    => null,
    //         'messages' => [
    //             'success' => 'Data Saved'
    //         ]
    //     ];
        
    //     return $this->respond($response, 200);
    // }

 
    // create a product
    // public function create()
    // {
    //     $model = new ProductModel();
    //     $data = [
    //         'product_name' => $this->request->getPost('product_name'),
    //         'product_price' => $this->request->getPost('product_price')
    //     ];
    //     $model->insert($data);
    //     $response = [
    //         'status'   => 201,
    //         'error'    => null,
    //         'messages' => [
    //             'success' => 'Data Saved'
    //         ]
    //     ];
         
    //     return $this->respondCreated($data, 201);
    // }
 
    // public function create(){

	// 	$rules = [
	// 		'product_name' => [
	// 			'rules'  => 'required',
	// 			'errors' => [
	// 				'required' => 'Nombre del producto'
	// 			]
	// 		],
	// 		'product_price' => [
	// 			'rules'  => 'required',
	// 			'errors' => [
	// 				'required' => 'Apellido es requerido.'
	// 			]
	// 		],
	// 		'password' => [
	// 			'rules'  => 'required',
	// 			'errors' => [
	// 				'required' => 'Password es requerido.'
	// 			]
	// 		],
	// 		'email'    => [
	// 			'rules'  => 'required|valid_email',
	// 			'errors' => [
	// 				'required' => 'Email es requerido.',
	// 				'valid_email' => 'Verifica el email.'
	// 			]
	// 		],
	// 	];		

	// 	$data = $this->request->getPost();		


	// 	if (!$this->validate($rules)) {

	// 		$errors = $this->validator->listErrors();
			

	// 		return $this->failValidationError();
			
	// 	}else{

	// 		$data = $this->UserModel->save($data);

	// 		return $this->respondCreated($data);
	// 	}		
		
	// }
    // update product
    public function update($id = null)
    {
        $model = new ProductModel();
        $json = $this->request->getJSON();
        if($json){
            $data = [
                'product_name' => $json->product_name,
                'product_price' => $json->product_price
            ];
        }else{
            $input = $this->request->getRawInput();
            $data = [
                'product_name' => $input['product_name'],
                'product_price' => $input['product_price']
            ];
        }
        // Insert to Database
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => true,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }

    // delete product
    public function delete($id = null)
    {
        $model = new ProductModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => true,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }    
    }
}

