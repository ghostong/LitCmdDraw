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
        echo str_repeat(chr(8), strlen($lastLength)), str_repeat(' ', strlen($lastLength)), str_repeat(chr(8), strlen($lastLength));
        self::$lastOutput = $string;
        echo self::$lastOutput;
    }

}