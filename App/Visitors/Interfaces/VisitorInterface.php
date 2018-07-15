<?php

namespace App\Visitors\Interfaces;

use App\Component\FileSystem;

interface VisitorInterface
{
    public function visit(FileSystem $obj);
}