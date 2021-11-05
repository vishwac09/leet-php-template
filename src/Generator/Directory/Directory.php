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
        $currentDir = getcwd();
        $this->setName($name);
        $srcPath = $currentDir . '/src';
        if (!file_exists($srcPath . '/' . $name)) {
            mkdir($srcPath . '/' . $name);
        }
        return true;
    }
    
    /**
     * {@inheritDoc}
     */
    public function createFiles(): bool
    {
        $problem = $this->fileFactory->getFileInstance('problem');
        $problem->create($this->getName());
        $unitTest = $this->fileFactory->getFileInstance('unit');
        $unitTest->create($this->getName());
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
