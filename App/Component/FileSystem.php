<?php

namespace App\Component;

use App\Visitors\Interfaces\VisitorInterface;

abstract class FileSystem
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public abstract function add(FileSystem $file);

    public function display()
    {
        echo sprintf("%s<br>\n", $this->getName());
    }

    public abstract function getChildren();

    public function accept(VisitorInterface $visitor)
    {
        $visitor->visit($this);
    }
}