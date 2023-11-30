<?php

//Abstract template engine for the framework

namespace framework;

class TemplateEngine
{

  protected $templateDir;
  protected $templateFile;
  protected $templateData;

  public function __construct($templateDir, $templateFile, $templateData)
  {
    $this->templateDir = $templateDir;
    $this->templateFile = $templateFile;
    $this->templateData = $templateData;
  }

  public function render() {
    $templatePath = $this->templateDir . $this->templateFile;
    if (file_exists($templatePath)) {
      extract($this->templateData);
      include $templatePath;
    }
  }
}