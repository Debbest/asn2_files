<?php

namespace framework;
class TemplateEngine
{
  //protected properties
  private $template;


  //constructor
  public function __construct(string $template)
  {
    $this->template = $template;
  }

  //use template
  public function use(array $data)
  {
    //check if

    //add data to template
    foreach ($data as $key => $value) {
      $$key = $value;
      $this->template = str_replace("{{" . $key . "}}", $value, $this->template);
    }
    //return template
    return $this->template;
  }



}