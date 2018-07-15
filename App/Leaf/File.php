<?php

namespace App\Leaf;

use App\Component\FileSystem;

class File extends FileSystem
{
    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function getName()
    {
        return parent::getName();
    }

    public function add(FileSystem $file)
    {
        throw new Exception('This method is not allowed.');
    }

    public function getChildren()
    {
        return array();
    }
}