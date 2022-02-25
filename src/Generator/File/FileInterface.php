<?php

namespace PHPAlgorithmScaffold\Generator\File;

interface FileInterface
{
    /**
     * Returns the name of the File.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Sets the name of the File.
     *
     * @param string $name
     *   The name of the file.
     *
     * @return FileInterface
     */
    public function setName(string $name): FileInterface;

    /**
     * Get the path where the file is created.
     *
     * @return string
     */
    public function getPath(): string;

    /**
     * Set the path of the directory where the file would be created.
     *
     * @param string $path
     *   The path of the corresponding directory.
     *
     * @return FileInterface
     */
    public function setPath(string $path): FileInterface;
}
