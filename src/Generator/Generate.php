<?php

namespace PHPAlgorithmScaffold\Generator;

use PHPAlgorithmScaffold\Generator\Directory\Directory;

/**
 * Class Generate
 * @package PHPAlgorithmScaffold\Generator
 */
class Generate
{
    /**
     * @var Directory
     *   The Directory instance.
     */
    protected Directory $directory;
    
    /**
     * Default constructor.
     */
    public function __construct()
    {
        $this->directory = new Directory();
    }
    
    /**
     * Entry point, which executes each step, to get the title from the user,
     * create directory and related files,
     */
    public function generateCodeTemplates()
    {
        // # First step is getting the problem title
        $problemTitle = $this->getProblemTitle();
        printf("\e[35mUsing Text as = \e \e[33m %s \e" . PHP_EOL, $problemTitle);
        //# We have the title, let start with creating the directory, file and a UnitTest file.
        printf("\e[35mCreating directory with name %s under src.\e", $problemTitle);
        $this->directory->create($problemTitle);
    }
    
    /**
     * Get the problem title, which user input on the terminal.
     *
     * @return string
     */
    public function getProblemTitle(): string
    {
        printf("\e[32mEnter #Problem title all special characters, spaces will be removed.\e\n");
        $problemTitle = fgets(STDIN);
        if (empty(trim($problemTitle))) {
            exit(PHP_EOL . "\e[31mExiting #Problem Title cannot be empty\e" . PHP_EOL);
        }
        return preg_replace('/[^A-Za-z0-9\-]/', '', $problemTitle);
    }
}
