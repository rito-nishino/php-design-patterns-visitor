<?php
require_once 'autoload.php';

use App\Composite\Dir;
use App\Leaf\File;
use App\Visitors\CountVisitor;

$root_dir = new Dir('/');

$file_1 = new File('file_01.txt');
$root_dir->add($file_1);

$file_2 = new File('file_02.txt');
$root_dir->add($file_2);

$dir_1 = new Dir('dir01/');
$root_dir->add($dir_1);

$dir_2 = new Dir('dir02/');
$dir_2->add(new File('file_03.txt'));
$root_dir->add($dir_2);

$dir_3 = new Dir('dir03/');
$dir_3->add(new File('file_04.txt'));
$dir_3->add(new File('file_05.txt'));
$dir_3->add(new File('file_06.txt'));

$dir_4 = new Dir('dir04/');
$dir_4->add(new File('file_07.txt'));
$dir_3->add($dir_4);

$root_dir->add($dir_3);

// 一覧の出力
$root_dir->display();

$visitor = new CountVisitor();
$root_dir->accept($visitor);

// 数の出力
echo '<br>';
echo sprintf('ディレクトリ数：%d<br>', $visitor->getDirectoriesCnt());
echo sprintf('ファイル数：：%d<br>', $visitor->getFilesCnt());


//echo'<pre>'; print_r($root_dir); echo'<pre>';