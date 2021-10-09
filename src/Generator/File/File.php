<?php

namespace PHPAlgorithmScaffold\Generator\File;

/**
 * Class Problem
 * @package PHPAlgorithmScaffold\Generator\File
 */
abstract class File implements FileInterface
{
    /**
     * @var string $name
     *   The name of the file ot be created.
     */
    protected string $name;
    
    /**
     * @var string $path
     *   The path where the file will be created.
     */
    protected string $path;
    
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
    public function setName(string $name): FileInterface
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function getPath(): string
    {
        return $this->path;
    }
    
    /**
     * @inheritDoc
     */
    public function setPath(string $path): FileInterface
    {
        $this->path = $path;
        return $this;
    }
    
    /**
     * Create file, we would be adding default code snippets.
     * Implementation will change as per the Files we are creating hence abstract.
     *
     * @return bool
     */
    abstract function create(): bool;
}