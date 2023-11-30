<?php
// Deborah Best

namespace framework;
class FormGenerator
{
  //start form
  public static function startForm($action, $method, $id, $name)
  {
    //start form with the action, method, and id
    echo "<form action='$action' method='$method' id='$id' name='$name'>";
  }

  //end form
  public static function endForm()
  {
    echo "</form>";
  }
  public static function hiddenInput($name) {
    echo "<input type='hidden' name='$name' value='$name' hidden>";
  }
  //create input
  public static function createInput($type, $name, $id, $placeholder, $label, $require)
  {
    if ($require) {
      echo "<label for='$id'>$label</label>";
      echo "<input type='$type' name='$name' id='$id' placeholder='$placeholder' required>";
    } else {

    echo "<label for='$id'>$label</label>";
    echo "<input type='$type' name='$name' id='$id' placeholder='$placeholder'>";
    }
  }
  //create select
  public static function createSelect($name, $id, $label, $options, $require)
  {
    if($require == true){
      echo "<label for='$id'>$label</label>";
      echo "<select name='$name' id='$id' required>";
      foreach ($options as $option) {
        echo "<option value='$option'>$option</option>";
      }
      echo "</select>";
    } else {
      echo "<label for='$id'>$label</label>";
      echo "<select name='$name' id='$id'>";
      foreach ($options as $option) {
        echo "<option value='$option'>$option</option>";
      }
      echo "</select>";
    }

  }

  //create textarea
  public static function createTextarea($name, $id, $label, $value, $require)
  {
    if($require == true){
      echo "<label for='$id'>$label</label>";
      echo "<textarea name='$name' id='$id' required>$value</textarea>";
    } else {
      echo "<label for='$id'>$label</label>";
      echo "<textarea name='$name' id='$id'>$value</textarea>";
    }
  }

  //create button
  public static function createButton($type, $id, $value)
  {
    echo "<button type='$type' id='$id'>$value</button>";
  }

  //create checkbox
  public static function createCheckbox($name, $id, $label, $value,$require)
  {
    if($require == true){
      echo "<label for='$id'>$label</label>";
      echo "<input type='checkbox' name='$name' id='$id' value='$value' required>";
    } else {
      echo "<label for='$id'>$label</label>";
      echo "<input type='checkbox' name='$name' id='$id' value='$value'>";
    }
  }

  //create radio button
  public static function createRadio($name, $id, $label, $value, $require)
  {
    if($require == true){
      echo "<label for='$id'>$label</label>";
      echo "<input type='radio' name='$name' id='$id' value='$value' required>";
    } else {
      echo "<label for='$id'>$label</label>";
      echo "<input type='radio' name='$name' id='$id' value='$value'>";
    }
  }
  //create label

}