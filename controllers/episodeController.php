<?php

class EpisodeController extends Controller
{

    function render()
    {
        $this->view->data = $this->model->getAll();
        if ($this->view->data) {
            $this->view->render('episodes/index');
        } else {
            ErrorController::renderError('Could not get episodes');
        }
    }

    function details($params)
    {
        $this->view->data = $this->model->getById($params[0]);
        if ($this->view->data) {
            $this->view->render('episodes/detail');
        } else {
            ErrorController::renderError("Could not get episode");
        }
    }

    //TODO in API
    function add($params)
    {
        $this->view->data = $this->model->insert($params);
        if ($this->view->data) {
            $this->view->render('episodes/index');
        } else {
            ErrorController::renderError("Could not add episode");
        }
    }

    //TODO in API
    function update($params)
    {
        $this->view->data = $this->model->update($params);
        if ($this->view->data) {
            $this->view->render('episodes/index');
        } else {
            ErrorController::renderError("Could not update episode");
        }
    }

    //TODO in API
    function delete($params)
    {
        $this->view->data = $this->model->delete($params[0]);
        if ($this->view->data) {
            $this->view->render('episodes/index');
        } else {
            ErrorController::renderError("Could not delete episode");
        }
    }
}
