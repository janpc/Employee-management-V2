<?php

require MODELS . 'locationModel.php';

class LocationController extends Controller
{

    private $locationModel;

    public function __construct()
    {
        parent::__construct();
        $this->locationModel = new LocationModel;
    }

    function render()
    {
        $this->view->data = $this->locationModel->getAll();
        if ($this->view->data) {
            $this->view->render('locations/index');
        } else {
            $this->view->render('locations/index');
            ErrorDisplayer::add('Could not get location');
        }
    }

    function details($params)
    {
        $this->view->data = $this->locationModel->getById($params[0]);
        if ($this->view->data) {
            $this->view->render('locations/detail');
        } else {
            $this->view->render('locations/index');
            ErrorDisplayer::add('Could not get location');
        }
    }

    function api($params = null)
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET': {
                    if ($params == null) {
                        $data = $this->locationModel->getAll();
                        echo json_encode($data);
                    } else {
                        $data = $this->locationModel->getById($params[0]);
                        echo json_encode($data);
                    }
                    break;
                }
            case 'POST': {
                    if (isset($_POST)) {
                        $character = json_decode(file_get_contents("php://input"), true);
                        $data = $this->locationModel->insert($character);
                        echo json_encode($data);
                        http_response_code(201);
                    } else {
                        http_response_code(400);
                    }
                    break;
                }
            case 'PUT': {
                    $employeeData = file_get_contents('php://input');
                    $params = json_decode($employeeData, true);
                    $this->locationModel->update($params);
                    http_response_code(204);
                    break;
                }
            case 'DELETE': {
                    if ($params != null) {
                        $this->locationModel->delete($params[0]);
                        http_response_code(204);
                    }
                    break;
                }
        }
    }
}
