<?php

class EpisodeController extends Controller{
    function render()
    {
        $this->view->data = $this->model->getAll();
        $this->view->render('episodes/index');
    }

    function details($params)
    {
        $this->view->data = $this->model->getById($params[0]);
        $this->view->render('episodes/detail');
    }

    function add($params)
    {
        $this->view->data = $this->model->insert($params);
        $this->view->render('episodes/index');
    }

    function update($params)
    {
        $this->view->data = $this->model->update($params);
        $this->view->render('episodes/index');
    }

    function delete($params)
    {
        $this->view->data = $this->model->delete($params[0]);
        $this->view->render('episodes/index');
    }
}