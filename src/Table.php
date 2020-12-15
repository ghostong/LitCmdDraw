<?php

namespace Lit\CmdDraw;

class Table
{

    /**
     *
     * @date 2020/12/15
     * @param array $title 数据标题一维数组
     * @param array $data 数据二维数组
     * @param string $drawLine 先最小组成
     * @param string $separator 边界分隔符
     * @param string $middleSeparator 中间分隔符
     * @return void
     * @author litong
     */
    public static function draw($title, $data, $drawLine = "-", $separator = "|", $middleSeparator = "+") {
        $title = array_values($title);
        $tdMaxWide = self::tdMaxWide($title, $data); //单元格长度数组
        $lineLen = self::lineLen($tdMaxWide, $title); //表格开始线长度

        self::writeLen($lineLen, $drawLine); //标题上线
        self::writeData($tdMaxWide, $title, $separator); //标题
        self::writeMiddleLen($tdMaxWide, $drawLine, $separator, $middleSeparator);//标题下线

        foreach ($data as $val) {
            self::writeData($tdMaxWide, $val, $separator); //内容行
        }

        self::writeLen($lineLen, $drawLine); //尾线
    }

    /**
     * 获取每列最大宽度
     * @date 2020/12/15
     * @param array $title
     * @param array $data
     * @return array
     * @author litong
     */
    private static function tdMaxWide($title, $data) {
        $allData = array_merge($data, [$title]);
        $lenArray = [];
        foreach ($allData as $lineData) {
            $lineData = array_values($lineData);
            foreach ($lineData as $k => $v) {
                $lenArray[$k][] = self::getStrWide($v) + 2;
            }
        }
        return array_map(function ($tt) {
            return max($tt);
        }, $lenArray);
    }

    /**
     * 计算线长度
     * @date 2020/12/15
     * @param $tabLen
     * @param $title
     * @return int
     * @author litong
     */
    private static function lineLen($tabLen, $title) {
        return count($title) + 1 + array_sum($tabLen);
    }

    /**
     * 生成空行
     * @date 2020/12/15
     * @param int $length
     * @param string $drawLine
     * @return void
     * @author litong
     */
    private static function writeLen($length, $drawLine = "-") {
        self::outPut(str_repeat($drawLine, $length));
    }

    /**
     * 生成中间行
     * @date 2020/12/15
     * @param array $tdMaxWide
     * @param string $drawLine
     * @param string $separator
     * @param string $middleSeparator
     * @return void
     * @author litong
     */
    private static function writeMiddleLen($tdMaxWide, $drawLine = "-", $separator = "|", $middleSeparator = "+") {
        $lineArray = [];
        foreach ($tdMaxWide as $val) {
            $lineArray[] = str_repeat($drawLine, $val);
        }
        self::outPut($separator . implode($middleSeparator, $lineArray) . $separator);
    }

    /**
     * 生成数据行
     * @date 2020/12/15
     * @param array $tdMaxWide
     * @param array $data
     * @param string $separator
     * @return void
     * @author litong
     */
    private static function writeData($tdMaxWide, $data, $separator = "|") {
        $data = array_values($data);
        $line = $separator;
        foreach ($tdMaxWide as $key => $val) {
            $value = $data[$key];
            $line .= str_repeat(' ', floor(($val - self::getStrWide($value)) / 2)) . $value . str_repeat(' ', ceil(($val - self::getStrWide($value)) / 2)) . $separator;
        }
        self::outPut($line);
    }

    /**
     * 获取文字占用屏幕宽度
     * @date 2020/12/15
     * @param $str
     * @return int
     * @author litong
     */
    private static function getStrWide($str) {
        return ceil((strlen($str) - mb_strlen($str)) / 2) + mb_strlen($str);
    }

    /**
     * 文字输出
     * @date 2020/12/15
     * @param $str
     * @return void
     * @author litong
     */
    private static function outPut($str) {
        echo $str, PHP_EOL;
    }
}
