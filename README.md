CmdDraw PHP
==============
CmdDraw PHP 帮助文件.

### 通过数据绘制表格

````php
//效果
//-------------------------------------
//| title1 | title2 | title3 | title4 |
//|--------+--------+--------+--------|
//|   1    |   2    |   3    |   4    |
//|   5    |   6    |   7    |   8    |
//|   9    |   10   |   11   |   12   |
//-------------------------------------
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
//效果
//[>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-----] (96%)
//注意中间不能有其他输出,会破坏进度条显示
\Lit\CmdDraw\ProgressBar::firstShow(100); //进度条总宽度 不是进度 取决于屏幕宽度.
for ($i = 0; $i <= 9999; $i++) {
    \Lit\CmdDraw\ProgressBar::loopShow($i, 9999); //每完成一次逻辑调用就执行一次
}
````

````php
//效果
//2600accb361b268.58336873                                                                                         
//3600accb386f798.42531805                                                                                         
//4600accb3acbfe9.71762105                                                                                         
//5600accb3d16b28.75228175                                                                                         
//6600accb4029171.37010576                                                                                         
//7600accb427f902.47444407                                                                                           
//8600accb44d1e01.53938303                                                                                           
//9600accb4728882.62165862                                                                                           
//10600accb497d8a5.70041610                                                                                          
//11600accb4bda8f8.32240463                                                                                           
//12600accb4e31800.30233695                                                                                           
//[>>>>>>>>>>>>----------------------------------------------------------------------------------------] (12% / 00:07)
//带详细信息的进度条
\Lit\CmdDraw\RollingBar::firstShow();
$time = time();
for ($i = 0; $i <= 100; $i++) {
    \Lit\CmdDraw\RollingBar::loopShow($i, 100, $i . " hhahaha", $time);
    usleep(150000);
}
````

### 画家

````php
//佛陀效果
//                   _ooOoo_
//                  o8888888o
//                  88" . "88
//                  (| -_- |)
//                  O\  =  /O
//               ____/`---'\____
//             .'  \|     |//  `.
//            /  \|||  :  |||//  \
//           /  _||||| -:- |||||-  \
//           |   | \\  -  /// |   |
//           | \_|  ''\---/''  |   |
//           \  .-\__  `-`  ___/-. /
//         ___`. .'  /--.--\  `. . __
//      ."" '<  `.___\_<|>_/___.'  >'"".
//     | | :  `- \`.;`\ _ /`;.`/ - ` : | |
//     \  \ `-.   \_ __\ /__ _/   .-` /  /
//======`-.____`-.___\_____/___.-`____.-'======
//                   `=---='
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
//                 永 无 B U G
//佛陀           
\Lit\CmdDraw\Artist::buddha('永 无 B U G');
````

````php
//键盘效果
//┌─────────────────────────────────────────────────────────────┐
//│┌───┬───┬───┬───┬───┬───┬───┬───┬───┬───┬───┬───┬───┬───┬───┐│
//││Esc│!1 │@2 │#3 │$4 │%5 │^6 │&7 │*8 │(9 │)0 │_- │+= │|\ │`~ ││
//│├───┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴───┤│
//││ Tab │ Q │ W │ E │ R │ T │ Y │ U │ I │ O │ P │{[ │}] │ BS  ││
//│├─────┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴┬──┴─────┤│
//││ Ctrl │ A │ S │ D │ F │ G │ H │ J │ K │ L │: ;│" '│ Enter  ││
//│├──────┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴─┬─┴────┬───┤│
//││ Shift  │ Z │ X │ C │ V │ B │ N │ M │< ,│> .│? /│Shift │Fn ││
//│└─────┬──┴┬──┴──┬┴───┴───┴───┴───┴───┴──┬┴───┴┬──┴┬─────┴───┘│
//│      │Fn │ Alt │         Space         │ Alt │Win│   HHKB   │
//│      └───┴─────┴───────────────────────┴─────┴───┘          │
//└─────────────────────────────────────────────────────────────┘
//                          永 无 B U G
//键盘
\Lit\CmdDraw\Artist::keyboard('永 无 B U G');
````

### 输出

````php
//行内输出文字
//效果 38
for ($i = 10; $i >= 0; $i--) {;
    usleep(500000);
    \Lit\CmdDraw\Output::rowRepeat(rand(0,999));
}
echo "\n";
````

````php
//行内倒计时10秒并输出
\Lit\CmdDraw\Output::sleep(10);
````

### 彩色文字

````php
//输出绿色文字
\Lit\CmdDraw\StyleOutput::success('操作成功');
````

````php
//输出蓝色文字
\Lit\CmdDraw\StyleOutput::info('输出进度');
````

````php
//输出黄色文字
\Lit\CmdDraw\StyleOutput::warning('请注意');
````

````php
//输出红色文字
\Lit\CmdDraw\StyleOutput::error('出现错误');
````

````php
//输出自定义样式
\Lit\CmdDraw\StyleOutput::error('出现错误');
````

````php
//自定义输出文字
echo \Lit\CmdDraw\StyleOutput::apply(
    '操作失误',
    \Lit\CmdDraw\StyleOutput::FOREGROUND_COLORS_MAGENTA,
    \Lit\CmdDraw\StyleOutput::BACKGROUND_COLORS_GREEN,
    [
        \Lit\CmdDraw\StyleOutput::OPTION_STYLE_BOLD, 
        \Lit\CmdDraw\StyleOutput::OPTION_STYLE_UNDERSCORE
    ]
);
````

### 生成一张带字母的图片

````php
$textPictures = new TextPictures();
$textPictures
    ->text(rand(0, 9)) // 文字
    ->textColor([255, 255, 255]) // 文字颜色
    ->textFont(__DIR__ . '/data/fonts/SourceCodePro-Regular.ttf') // 字体
    ->fontSize(110) // 字号
    ->textOffsetX(-5) // 设置x轴偏移
    ->textOffsetY(-5) // 设置y轴偏移
    ->imageColor([64, 158, 255]) // 背景颜色
    ->imageHeight(200) // 背景高度
    ->imageWidth(200) //背景宽度
    ->savePath('./a.png') //保存路径
    ->createImage();
````