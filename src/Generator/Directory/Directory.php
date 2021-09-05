<?php

namespace LeetPHPTemplate\Generator\Directory;

use LeetPHPTemplate\Generator\File\File;

/**
 * Class Directory
 * @package LeetPHPTemplate\Generator\Directory
 */
class Directory {
  
  protected $file;
  
  /**
   * Directory constructor.
   */
  public function __construct(){
    $this->file = new File();
  }
  
  /**
   * @param $name
   */
  public function create($name) {
    $currentDir = getcwd();
    $srcPath = $currentDir . '/src';
    if (!file_exists($srcPath . '/' . $name)) {
      mkdir($srcPath . '/' . $name);
    }
  }
  
}