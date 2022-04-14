<?php

namespace PHPAlgorithmScaffold\Generator\Directory;

use PHPAlgorithmScaffold\Generator\File\FileFactory;
use League\CLImate\CLImate;

/**
 * Class Directory
 *
 * @package PHPAlgorithmScaffold\Generator\Directory
 */
class Directory implements DirectoryInterface
{
    /**
     * @var CLImate
     *   The CLImate instance.
     */
    protected $climate;

    /**
     * @var FileFactory
     *   The fileFactory instance.
     */
    protected $fileFactory;

    /**
     * @var string
     *   The name of the directory.
     */
    protected $name;

    /**
     * @var string
     *   PSR4 path
     */
    protected $psrPath = 'src';

    /**
     * Directory constructor.
     */
    public function __construct()
    {
        $this->fileFactory = new FileFactory();
        $this->climate = new CLImate();
    }

    /**
     * {@inheritDoc}
     */
    public function create(string $name): bool
    {
        $this->setName($name);
        $this->climate->magenta()->out(
            'Enter the Directory name default (src)'
        );
        $tempName = trim(fgets(STDIN));
        if (!empty(trim($tempName))) {
            $this->psrPath = $tempName;
        }
        $srcPath = getcwd() . '/' . $this->psrPath;
        $directoryPath = $srcPath . '/' . $name;

        if (!file_exists($directoryPath)) {
            mkdir($directoryPath);
            $this->climate->green()->out(
                'Directory ' . $directoryPath . ' created'
            );
        }
        $this->createFiles($directoryPath);
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function createFiles(string $directoryPath): bool
    {
        $problem = $this->fileFactory->getFileInstance('problem');
        $problem->create($directoryPath, $this->getName());
        $this->climate->green()->out(
            'Problem file created'
        );
        $unitTest = $this->fileFactory->getFileInstance('unit');
        $this->climate->magenta()->out(
            'Considering unit test case path as "tests"'
        );
        $currentPath = getcwd() . '/tests';
        if (!file_exists($currentPath)) {
            mkdir($currentPath);
        }
        $unitTest->create($currentPath, $this->getName() . 'Test');
        $this->climate->green()->out(
            'Unit test case file created'
        );
        return true;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name): DirectoryInterface
    {
        $this->name = $name;
        return $this;
    }
}
