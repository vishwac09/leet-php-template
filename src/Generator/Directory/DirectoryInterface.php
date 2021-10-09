<?php


namespace PHPAlgorithmScaffold\Generator\Directory;


interface DirectoryInterface
{
    /**
     * Create the directory, with the given name.
     *
     * @param string $name
     *   User provided title of the Problem whose files/directory would be created.
     *
     * @return bool
     */
    public function create(string $name): bool;
    
    /**
     * Returns the name of the Directory.
     *
     * @return string
     */
    public function getName(): string;
    
    /**
     * Set the name of the Directory.
     *
     * @param string $name
     * @return DirectoryInterface
     */
    public function setName(string $name): DirectoryInterface;
}