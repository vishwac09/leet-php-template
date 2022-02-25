<?php

namespace PHPAlgorithmScaffold\Generator\File;

/**
 * Abstract Class Problem.
 * @package PHPAlgorithmScaffold\Generator\File
 */
abstract class File implements FileInterface
{
    /**
     * @var string $name
     *   The name of the file ot be created.
     */
    protected $name;

    /**
     * @var string $path
     *   The path where the file will be created.
     */
    protected $path;

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
     * @param string $path
     *   The path where to create the files.
     * @param string $name
     *   The name of the file to create.
     *
     * @return bool
     */
    abstract public function create(string $path, string $name): bool;
}
