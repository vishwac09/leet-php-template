<?php

namespace LeetPHPTemplate\Generator;

use LeetPHPTemplate\Generator\Directory\Directory;
use LeetPHPTemplate\Generator\UnitTest\UnitTest;
use Nette\PhpGenerator\ClassType;

/**
 * Class Generate
 * @package LeetPHPTemplate\Generator
 */
class Generate
{
  /**
   * @var Directory
   */
  protected $directory;
  
  /**
   * @var UnitTest
   */
  protected $unitTest;
  
  /**
   * Generate constructor.
   */
  public function __construct() {
    $this->directory = new Directory();
    $this->unitTest = new UnitTest();
  }
  
  /**
   * Function
   */
  public function generateCodeTemplates() {
    // # First step is getting the problem title
    $problemTitle = $this->getProblemTitle();
    printf( "\e[35m Using Text as => \e \e[33m %s \e" . PHP_EOL, $problemTitle);
    //# We have the title, let start with creating the directory, file and a Test file.
    printf( "\e[34m Creating directory with name %s under src directory.\e", $problemTitle);
    $this->directory->create($problemTitle);
  }
  
  /**
   * @return string|string[]|null
   */
  public function getProblemTitle() {
    printf("\e[32mEnter #Problem title all special characters, spaces will be removed.\e\n");
    $problemTitle = fgets(STDIN);
    if (empty(trim($problemTitle))) {
      exit(PHP_EOL . "\e[31mExiting #Problem Title cannot be empty\e" . PHP_EOL);
    }
    $problemTitle = preg_replace('/[^A-Za-z0-9\-]/', '', $problemTitle);
    return $problemTitle;
  }
}
