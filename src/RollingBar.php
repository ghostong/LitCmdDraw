<?php


namespace Lit\CmdDraw;


class RollingBar
{
    private static $screenWidth = 100;
    private static $notFinished = '-';
    private static $finished = '>';
    private static $defBar = '[%s%s] (%d%% / %s)';
    private static $lastBarLen = 0;
    private static $lastTime = 0;
    private static $remaining = "-:-";

    /**
     * 首屏显示,等待数据加载
     * @date 2020/12/18
     * @return void
     * @author litong
     */
    public static function firstShow() {
        $bar = sprintf(self::$defBar, str_repeat(self::$notFinished, self::$screenWidth), '', 0, self::$remaining);
        self::output(str_repeat(PHP_EOL, 50), $bar);
    }

    /**
     * 循环加载,显示进度
     * @date 2020/12/18
     * @param $currentLen
     * @param $totalLen
     * @param $lineStr
     * @param $startTimeStamp
     * @return void
     * @author litong
     */
    public static function loopShow($currentLen, $totalLen, $lineStr, $startTimeStamp) {
        if ($currentLen == $totalLen) {
            $finishedLen = self::$screenWidth;
            $notFinishedLen = 0;
        } else {
            $finishedLen = round($currentLen / $totalLen, 2) * self::$screenWidth;
            $notFinishedLen = self::$screenWidth - $finishedLen;
        }
        if (self::$lastTime != time()) {
            self::$remaining = self::getRemainTime($startTimeStamp, $currentLen, $totalLen);
            self::$lastTime = time();
        }
        $bar = sprintf(self::$defBar, str_repeat(self::$finished, $finishedLen), str_repeat(self::$notFinished, $notFinishedLen), $finishedLen, self::$remaining);
        self::output($lineStr, $bar);
    }

    private static function getRemainTime($startTime, $currentLen, $totalLen) {
        $use = time() - $startTime;
        if ($use > 0) {
            $t = round(($use / ($currentLen / $totalLen)) - $use);
            return sprintf('%02d', floor($t / 60)) . ":" . sprintf('%02d', ($t % 60));
        } else {
            return "-:-";
        }
    }

    private static function output($line, $bar) {
        echo "\r", str_repeat(" ", self::$lastBarLen), "\r", $line, PHP_EOL, $bar;
        self::$lastBarLen = strlen($bar);
    }

}