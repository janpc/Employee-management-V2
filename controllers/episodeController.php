<?php

require MODELS . 'episodeModel.php';

class EpisodeController extends Controller
{
    private $episodeModel;

    public function __construct()
    {
        parent::__construct();
        $this->episodeModel = new EpisodeModel;
    }

    function render()
    {
        $this->view->render('episodes/index');
    }

    function details($params)
    {
        $this->view->data = $this->episodeModel->getById($params[0]);
        if ($this->view->data) {
            $this->view->render('episodes/detail');
        } else {
            $this->view->render('episodes/index');
            ErrorDisplayer::add("Could not get episode");
        }
    }


    function api($params = null)
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET': {
                    if ($params == null) {
                        $data = $this->episodeModel->getAll();
                        echo json_encode($data);
                    } else {
                        $data = $this->episodeModel->getById($params[0]);
                        echo json_encode($data);
                    }
                    break;
                }
            case 'POST': {
                    if (isset($_POST)) {
                        $params = json_decode(file_get_contents("php://input"), true);
                        $data = $this->episodeModel->insert($params);
                        echo json_encode($data);
                        http_response_code(201);
                    } else {
                        http_response_code(400);
                    }
                    break;
                }
            case 'PUT': {
                    $body = file_get_contents('php://input');
                    $episode = json_decode($body, true);
                    $this->episodeModel->update($episode);
                    http_response_code(204);
                    break;
                }
            case 'DELETE': {
                    if ($params != null) {
                        $this->episodeModel->delete($params[0]);
                        http_response_code(204);
                    }
                    break;
                }
        }
    }
}
