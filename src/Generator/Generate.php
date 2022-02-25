<?php

namespace PHPAlgorithmScaffold\Generator;

use PHPAlgorithmScaffold\Generator\Directory\Directory;

use League\CLImate\CLImate;

/**
 * Class Generate
 * @package PHPAlgorithmScaffold\Generator
 */
class Generate
{
    /**
     * @var CLImate
     *   The CLImate instance.
     */
    protected $climate;

    /**
     * @var Directory
     *   The Directory instance.
     */
    protected $directory;
    
    /**
     * Default constructor.
     */
    public function __construct()
    {
        $this->directory = new Directory();
        $this->climate = new CLImate();
    }
    
    /**
     * Entry point, which executes each step, to get the title from the user,
     * create directory and related files,
     */
    public function generateCodeTemplates()
    {
        // Send welcome to the user.
        $this->climate->bold()->blink()->shout('PHP Scaffold generator');
        // # First step is getting the problem title
        $problemTitle = $this->getProblemTitle();
        $this->climate->magenta()->out('Using Text as = ' . $problemTitle);
        //# We have the title, let start with creating the directory, 
        //file and a UnitTest file.
        $this->directory->create($problemTitle);
    }
    
    /**
     * Get the problem title, which user input on the terminal.
     *
     * @return string
     */
    public function getProblemTitle(): string
    {
        $this->climate->magenta()->out('Enter #Problem title all special '
                . 'characters, spaces will be removed.');
        $problemTitle = fgets(STDIN);
        if (empty(trim($problemTitle))) {
            $this->climate->shout()->out('Exiting #Problem Title '
                    . 'cannot be empty');
            exit();
        }
        return preg_replace('/[^A-Za-z0-9\-]/', '', $problemTitle);
    }
}
