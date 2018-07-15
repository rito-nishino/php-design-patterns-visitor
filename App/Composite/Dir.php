<?php

namespace App\Composite;

use App\Component\FileSystem;

class Dir extends FileSystem
{
    private $files;

    public function __construct($name)
    {
        parent::__construct($name);
        $this->files = [];
    }

    public function add(FileSystem $file)
    {
        array_push($this->files, $file);
    }

    public function display()
    {
        parent::display();
        foreach ($this->files as $file) {
            echo $file->display();
        }
    }

    public function getChildren()
    {
        return $this->files;
    }
}