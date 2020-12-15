CmdDraw PHP
==============
CmdDraw PHP 帮助文件.

````php

//通过数据绘制表格
$title = ['title1', 'title2', 'title3', 'title4']; //表格标题
$data = [ //表格数据
    ["aaa" => 1, "ccc" => 2, "bbb" => 3, "eee" => 4],
    ["aaa1" => 5, "ccc1" => 6, "bbb1" => 7, "eee1" => 8],
    ["aaa2" => 9, "ccc2" => 10, "bbb2" => 11, "eee2" => 12],
];
$drawLine = "-"; //表格线最小组成
$separator = "|"; //表格边界分隔符最小组成
$middleSeparator = "+"; //中线线分割组成
\Lit\CmdDraw\Table::draw($title, $data, $drawLine, "|", "+");

````
