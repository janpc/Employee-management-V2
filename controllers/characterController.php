<?php

class CharacterController extends Controller
{
    function render()
    {
        $this->view->data = $this->model->getAll();
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
}
