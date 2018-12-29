<?php
class Word {

  function __construct() {
    include_once APPPATH .'libraries/PHPWord-develop/src/PhpWord/Style.php';
    include_once APPPATH .'libraries/PHPWord-develop/src/PhpWord/PhpWord.php';
    include_once APPPATH .'libraries/PHPWord-develop/src/PhpWord/Settings.php';
    include_once APPPATH .'libraries/PHPWord-develop/src/PhpWord/IOFactory.php';
    include_once APPPATH .'libraries/PHPWord-develop/src/PhpWord/Media.php';
    include_once APPPATH .'libraries/PHPWord-develop/src/PhpWord/TemplateProcessor.php';
    include_once APPPATH .'libraries/PHPWord-develop/src/PhpWord/Template.php';
  }
}
?>
