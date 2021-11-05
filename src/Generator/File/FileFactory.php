<?php


namespace PHPAlgorithmScaffold\Generator\File;

/**
 * Class FileFactory
 * @package PHPAlgorithmScaffold\Generator\File
 */
class FileFactory
{
    /**
     * Returns the instance of the required file by type.
     *
     * @param $type
     * @return Problem|UnitTest
     */
    public function getFileInstance($type)
    {
        // @todo change later.
        if ($type === 'problem') {
            return new Problem();
        } elseif ($type === 'unit') {
            return new UnitTest();
        }
    }
}
