<?php

require(__DIR__ . '/vendor/autoload.php');

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


//进度条
//注意中间不能有其他输出,会破坏进度条显示
\Lit\CmdDraw\ProgressBar::firstShow(100); //进度条总宽度 不是进度 取决于屏幕宽度.
for ($i = 0; $i <= 9999; $i++) {
    \Lit\CmdDraw\ProgressBar::loopShow($i, 9999); //每完成一次逻辑调用就执行一次
}

//带详细信息的进度条
\Lit\CmdDraw\RollingBar::firstShow();
$time = time();
for ($i = 0; $i <= 100; $i++) {
    \Lit\CmdDraw\RollingBar::loopShow($i, 100, uniqid($i, true), $time);
    usleep(150000);
}

//佛陀
\Lit\CmdDraw\Artist::buddha('永 无 B U G');

//键盘
\Lit\CmdDraw\Artist::keyboard('永 无 B U G');

//行内输出文字
for ($i = 10; $i >= 0; $i--) {
    usleep(500000);
    \Lit\CmdDraw\Output::rowRepeat(rand(0, 999));
}

//行内倒计时10秒并输出
\Lit\CmdDraw\Output::sleep(10);

//输出绿色文字
\Lit\CmdDraw\StyleOutput::success('操作成功');

//输出蓝色文字
\Lit\CmdDraw\StyleOutput::info('输出进度');

//输出黄色文字
\Lit\CmdDraw\StyleOutput::warning('请注意');

//输出红色文字
\Lit\CmdDraw\StyleOutput::error('出现错误');

//自定义输出文字
echo \Lit\CmdDraw\StyleOutput::apply(
    '操作失误',
    \Lit\CmdDraw\StyleOutput::FOREGROUND_COLORS_MAGENTA,
    \Lit\CmdDraw\StyleOutput::BACKGROUND_COLORS_GREEN,
    [\Lit\CmdDraw\StyleOutput::OPTION_STYLE_BOLD, \Lit\CmdDraw\StyleOutput::OPTION_STYLE_UNDERSCORE]
);