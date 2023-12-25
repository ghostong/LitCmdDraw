<?php

namespace Lit\CmdDraw;

class Output
{
    protected static $lastOutput = '';

    /**
     * 行内输出
     * @date 2023/9/5
     * @author litong
     */
    public static function rowRepeat($string) {
        $lastLength = self::$lastOutput;
        echo chr(13), str_repeat(' ', strlen($lastLength)), chr(13);
        self::$lastOutput = $string;
        echo self::$lastOutput;
    }

    /**
     * 输出X秒倒计时
     * @date 2023/12/25
     * @param $seconds
     * @author litong
     */
    public static function sleep($seconds) {
        for ($i = $seconds; $i >= 0; $i--) {
            self::rowRepeat($i);
            sleep(1);
        }
    }

}