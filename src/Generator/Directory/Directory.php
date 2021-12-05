<?php

namespace PHPAlgorithmScaffold\Generator\Directory;

use PHPAlgorithmScaffold\Generator\File\FileFactory;

/**
 * Class Directory
 *
 * @package PHPAlgorithmScaffold\Generator\Directory
 */
class Directory implements DirectoryInterface
{
    /**
     * @var FileFactory
     *   The fileFactory instance.
     */
    protected FileFactory $fileFactory;
  
    /**
     * @var string
     *   PSR4 path
     */
    protected string $psrPath = 'src';
    
    /**
     * @var string
     *   The name of the directory.
     */
    protected string $name;
    
    /**
     * Directory constructor.
     */
    public function __construct()
    {
        $this->fileFactory = new FileFactory();
    }
    
    /**
     * {@inheritDoc}
     */
    public function create(string $name): bool
    {
        $this->setName($name);
        $srcPath = getcwd() . '/' . $this->psrPath;
        $directoryPath = $srcPath . '/' . $name;
        if (!file_exists($directoryPath)) {
            mkdir($directoryPath);
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
        $unitTest = $this->fileFactory->getFileInstance('unit');
        $currentPath = getcwd() . '/tests';
        $unitTest->create($currentPath, $this->getName());
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
