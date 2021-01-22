<?php


namespace Lit\CmdDraw;


class ProgressBar
{
    private static $screenWidth = 100;
    private static $notFinished = '-';
    private static $finished = '>';
    private static $defBar = '[%s%s] (%d%%)';

    /**
     * 首屏显示,等待数据加载
     * @date 2020/12/18
     * @param $screenWidth
     * @return void
     * @author litong
     */
    public static function firstShow($screenWidth = 100) {
        self::$screenWidth = $screenWidth;
        $bar = sprintf(self::$defBar, str_repeat(self::$notFinished, self::$screenWidth), '', 0);
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
        echo "\r" . $str;
    }

}