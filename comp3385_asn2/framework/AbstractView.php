<?php

abstract class AbstractView
{
  //properties
  private $template;
  private $data = [];

  //add template to the view

  /**
   * @param mixed $template
   */
  public function setTemplate(string $template): void
  {
    //check for no file
    if (!empty($template)) {
      trigger_error("Template file was not received!", E_USER_ERROR);
    }
    //check for file not found
    if (!file_exists($template)) {
      trigger_error("Template $template was not found!", E_USER_ERROR);
    }
    //check for file not readable

    //check for file type

    //set template
    $this->template = $template;
  }

  //add data to the view

  public function addData(array $data): void
  {
    //check for empty array
    if (empty($data)) {
      trigger_error("Data array was not received!", E_USER_ERROR);
    }
    //capture data
    foreach ($this->data as $key => $value) {
      //check if key exists
      if (array_key_exists($key, $this->data)) {
        trigger_error("Key $key already exists!", E_USER_ERROR);
      }
      $this->data[$key] = $value;
    }
  }


  //render the view
  abstract public function render(): void;

}