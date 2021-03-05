<?php

require MODELS . 'travelModel.php';

class TravelController extends Controller{

    function __construct () {
        parent::__construct();
        $this->model = new TravelModel;
    }
    function render()
    {
        $this->view->data = $this->model->getAllTravelExt();
        if ($this->view->data) {
            $this->view->render('travel/index');
        } else {
            ErrorController::renderError('Could not get travel');
        }
    }

    function api($params, $queries)
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET': {
                    if (isset($queries['id'])) {
                        $data = $this->model->getAllTravelExt();
                        echo json_encode($data);
                    } else {
                        $data = $this->model->getAllTravelExt();
                        echo json_encode($data);
                    }
                    break;
                }
            /* case 'POST': {
                    if (isset($_POST)) {
                        $character = json_decode(file_get_contents("php://input"), true);
                        $data = $this->characterModel->insert($character);
                        echo json_encode($data);
                        http_response_code(201);
                    } else {
                        http_response_code(400);
                    }
                    break;
                }
            case 'PUT': {
                    $body = file_get_contents('php://input');
                    $character = json_decode($body, true);
                    $this->characterModel->update($character);
                    http_response_code(204);
                    break;
                }
            case 'DELETE': {
                    $this->characterModel->delete($queries['id']);
                    http_response_code(204);
                    break;
                } */
        }
    }

    function details($params)
    {
        $this->view->data = $this->model->getTravelDetail($params[0]);
        if ($this->view->data) {
            $this->view->render('travel/detail');
        } else {
            ErrorController::renderError("Could not get travel");
        }
    }

    /* function renderCharacters($id)
    {
        $this->view->data = $this->model->getCharactersOnTravel($id);
        if ($this->view->data) {
            $this->view->render('travel/character');
        } else {
            ErrorController::renderError('Could not get travel');
        }
    }
    function renderOriginLoc($id_loc)
    {
        $this->view->data = $this->model->getLocationTravelInfo($id_loc);
        if ($this->view->data) {
            $this->view->render('travel/location');
        } else {
            ErrorController::renderError('Could not get travel');
        }
    }
    function renderTargetLoc($id_loc)
    {
        $this->view->data = $this->model->getLocationTravelInfo($id_loc);
        if ($this->view->data) {
            $this->view->render('travel/location');
        } else {
            ErrorController::renderError('Could not get travel');
        }
    }
    function renderEpisode($id_ep)
    {
        $this->view->data = $this->model->getEpisodeTravelInfo($id_ep);
        if ($this->view->data) {
            $this->view->render('travel/location');
        } else {
            ErrorController::renderError('Could not get travel');
        }
    } */

}

