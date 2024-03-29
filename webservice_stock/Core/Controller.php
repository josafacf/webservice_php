<?php 

namespace Core;

class Controller {

	public function method()
	{
		return $_SERVER['REQUEST_METHOD'];
	}

	public function request_data()
	{
		switch ($this->method()) 
		{
			case 'GET':
					return $_GET;
				break;
			
			case 'PUT':
			case 'DELETE':
					parse_str(file_get_contents('php://input'), $data);
					return (array) $data;
				break;

			case 'POST':
					$data = json_decode(file_get_contents('php://input'));
					
					if (is_null($data))
					{	
						$data = $_POST;
					}

				return (array) $data;
				break;
		}
	}

	public function return_json($data_array)
	{
		header("Content-Type: application/json");
		echo json_encode($data_array);
		exit;
	}

}

