<?php

require MODELS . 'characterModel.php';

class CharacterController extends Controller
{
    private $characterModel;

    public function __construct()
    {
        parent::__construct();
        $this->characterModel = new CharacterModel;
    }

    function render()
    {
        $this->view->data = $this->characterModel->getAll();
        if ($this->view->data) {
            $this->view->render('characters/index');
        } else {
            ErrorDisplayer::show('Could not get characters');
        }
    }

    function details($params)
    {
        $this->view->data = $this->characterModel->getExtendedById($params[0]);
        if ($this->view->data) {
            $this->view->render('characters/detail');
        } else {
            ErrorDisplayer::show('Could not get character');
        }
    }

    function api($params, $queries)
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET': {
                    if (isset($queries['id'])) {
                        $data = $this->characterModel->getById($params[0]);
                        echo json_encode($data);
                    } else {
                        $data = $this->characterModel->getAll();
                        echo json_encode($data);
                    }
                    break;
                }
            case 'POST': {
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
                }
        }
    }
}
