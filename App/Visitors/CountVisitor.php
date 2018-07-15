<?php

namespace App\Visitors;

use App\Visitors\Interfaces\VisitorInterface;
use App\Component\FileSystem;

class CountVisitor implements VisitorInterface
{
    private $directories_cnt = 0;
    private $files_cnt = 0;

    public function visit(FileSystem $obj)
    {
        $class_name = basename(strtr(get_class($obj), '\\', '/'));
        if ($class_name === 'Dir') {
            $this->directories_cnt++;
        } else if ($class_name === 'File') {
            $this->files_cnt++;
        }

        foreach ($obj->getChildren() as $c) {
            $this->visit($c);
        }
    }

    public function getDirectoriesCnt()
    {
        return $this->directories_cnt;
    }

    public function getFilesCnt()
    {
        return $this->files_cnt;
    }
}