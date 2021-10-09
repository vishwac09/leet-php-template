<?php

namespace PHPAlgorithmScaffold\Generator\Directory;

/**
 * Class Directory
 *
 * @package PHPAlgorithmScaffold\Generator\Directory
 */
class Directory implements DirectoryInterface {
    
    /**
     * @var string
     *   The name of the directory.
     */
    protected string $name;
    
    /**
     * Directory constructor.
     */
    public function __construct(){
    }
    
    /**
     * {@inheritDoc}
     */
    public function create(string $name): bool {
        $currentDir = getcwd();
        $srcPath = $currentDir . '/src';
        if (!file_exists($srcPath . '/' . $name)) {
            mkdir($srcPath . '/' . $name);
        }
        return TRUE;
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