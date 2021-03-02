<?php

class CharacterController extends Controller
{
    function render()
    {
        $this->view->render('characters/index');
    }

    function details($params)
    {
        $this->view->data = $this->model->getById($params[0]);
        $this->view->render('characters/detail');
    }

    function add($params)
    {
        $this->view->data = $this->model->insert($params);
        $this->view->render('characters/index');
    }

    function update($params)
    {
        $this->view->data = $this->model->update($params);
        $this->view->render('characters/index');
    }

    function delete($params)
    {
        $this->view->data = $this->model->delete($params[0]);
        $this->view->render('characters/index');
    }

    function api( $params = null ){
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET': {
                    if($params==null){
                        $data = $this->model->getAll();
                        echo json_encode($data);
                    }else{
                        $data = $this->model->getById($params[0]);
                        echo json_encode($data);
                    }
                    break;
                }
            case 'POST': {
                    if (isset($_POST)) {
                        $params = json_decode(file_get_contents("php://input"), true);
                        $data = $this->model->insert($params);
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
                    $this->model->update($params);
                    http_response_code(204);
                    break;
                }
            case 'DELETE': {
                    if ($params != null) {
                        $this->model->delete($params[0]);
                        http_response_code(204);
                    }
                    break;
                }
        }
    }
}
