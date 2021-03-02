<?php

class CharacterController extends Controller
{
    function render()
    {
        $this->view->data = $this->model->getAll();
        if ($this->view->data) {
            $this->view->render('characters/index');
        } else {
            ErrorController::renderError('Could not get characters');
        }
    }

    function details($params)
    {
        $this->view->data = $this->model->getExtendedById($params[0]);
        if ($this->view->data) {
            $this->view->render('characters/detail');
        } else {
            ErrorController::renderError('Could not get character');
        }
    }

    //TODO in API
    function add($params)
    {
        $character = new Character;
        $character->name = 'Peter Smith';
        $character->species = 'Human';
        $character->gender = 'Male';
        $character->originLocId = 3;
        $character->lastLocId = 3;
        $this->model->insert($character);
        $this->view->data = $this->model->getAll();
        $this->view->render('characters/index');
    }

    //TODO in API
    function update($params)
    {
        $obj = new stdClass;
        $this->view->data = $this->model->update($obj);
        //$this->view->render('characters/index');
    }

    //TODO in API
    function delete($params)
    {
        $this->view->data = $this->model->delete($params[0]);
        $this->view->render('characters/index');
    }
}
