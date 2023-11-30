<?php

abstract class AbstractController
{
    protected $view;
    protected $model;

    //create model and view
    protected function makeModel() : Model {
      return new Model;
    }

    protected function makeView() : View {
      return new View;
    }

    // create the response object
    protected function makeResponse() : Response{
        return new Response();
    }

    // run the controller
    abstract public function run();


}