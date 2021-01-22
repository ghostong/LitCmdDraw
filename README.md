CmdDraw PHP
==============
CmdDraw PHP 帮助文件.

### 通过数据绘制表格

````php
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

### 进度条

````php
//注意中间不能有其他输出,会破坏进度条显示
\Lit\CmdDraw\ProgressBar::firstShow(100); //进度条总宽度 不是进度 取决于屏幕宽度.
for ($i = 0; $i <= 9999; $i++) {
    \Lit\CmdDraw\ProgressBar::loopShow($i, 9999); //每完成一次逻辑调用就执行一次
}
````

````php
//带详细信息的进度条
\Lit\CmdDraw\RollingBar::firstShow();
$time = time();
for ($i = 0; $i <= 100; $i++) {
    \Lit\CmdDraw\RollingBar::loopShow($i, 100, $i . " hhahaha", $time);
    usleep(150000);
}
````