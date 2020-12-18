<?php


namespace Lit\CmdDraw;


class ProgressBar
{
    private static $screenWidth = 100;
    private static $notFinished = '-';
    private static $finished = '>';
    private static $defBar = '[%s%s] (%d%%)';
    private static $lastShow = '';

    /**
     * 首屏显示,等待数据加载
     * @date 2020/12/18
     * @param $screenWidth
     * @return void
     * @author litong
     */
    public static function firstShow($screenWidth) {
        $bar = sprintf(self::$defBar, str_repeat(self::$notFinished, $screenWidth), '', 0);
        self::output($bar);
    }

    /**
     * 循环加载,显示进度
     * @date 2020/12/18
     * @param $currentLen
     * @param $totalLen
     * @return void
     * @author litong
     */
    public static function loopShow($currentLen, $totalLen) {
        if ($currentLen == $totalLen) {
            $finishedLen = self::$screenWidth;
            $notFinishedLen = 0;
        } else {
            $finishedLen = round($currentLen / $totalLen, 2) * self::$screenWidth;
            $notFinishedLen = self::$screenWidth - $finishedLen;
        }
        $bar = sprintf(self::$defBar, str_repeat(self::$finished, $finishedLen), str_repeat(self::$notFinished, $notFinishedLen), $finishedLen);
        self::output($bar);
    }

    private static function output($str) {
        echo self::backSpace(self::$lastShow) . $str;
        self::$lastShow = $str;
    }

    private static function backSpace($str) {
        return str_repeat(chr(8), strlen($str));
    }

}