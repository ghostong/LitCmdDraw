<?php

namespace Lit\CmdDraw;

class StyleOutput
{

    //文字颜色
    const FOREGROUND_COLORS_BLACK = ['set' => 30, 'unset' => 39];
    const FOREGROUND_COLORS_RED = ['set' => 31, 'unset' => 39];
    const FOREGROUND_COLORS_GREEN = ['set' => 32, 'unset' => 39];
    const FOREGROUND_COLORS_YELLOW = ['set' => 33, 'unset' => 39];
    const FOREGROUND_COLORS_BLUE = ['set' => 34, 'unset' => 39];
    const FOREGROUND_COLORS_MAGENTA = ['set' => 35, 'unset' => 39];
    const FOREGROUND_COLORS_CYAN = ['set' => 36, 'unset' => 39];
    const FOREGROUND_COLORS_WHITE = ['set' => 37, 'unset' => 39];

    //背景色
    const BACKGROUND_COLORS_BLACK = ['set' => 40, 'unset' => 49];
    const BACKGROUND_COLORS_RED = ['set' => 41, 'unset' => 49];
    const BACKGROUND_COLORS_GREEN = ['set' => 42, 'unset' => 49];
    const BACKGROUND_COLORS_YELLOW = ['set' => 43, 'unset' => 49];
    const BACKGROUND_COLORS_BLUE = ['set' => 44, 'unset' => 49];
    const BACKGROUND_COLORS_MAGENTA = ['set' => 45, 'unset' => 49];
    const BACKGROUND_COLORS_CYAN = ['set' => 46, 'unset' => 49];
    const BACKGROUND_COLORS_WHITE = ['set' => 47, 'unset' => 49];

    //样式选项 1：加粗 4：下划线 5：闪烁 7：反显 8：隐藏
    const OPTION_STYLE_BOLD = ['set' => 1, 'unset' => 22];
    const OPTION_STYLE_UNDERSCORE = ['set' => 4, 'unset' => 24];
    const OPTION_STYLE_BLINK = ['set' => 5, 'unset' => 25];
    const OPTION_STYLE_REVERSE = ['set' => 7, 'unset' => 27];
    const OPTION_STYLE_CONCEAL = ['set' => 8, 'unset' => 28];

    /**
     * 绿色文字输出
     */
    public static function success(...$args) {
        $text = implode(' ', $args);
        echo self::apply($text . "\n", self::FOREGROUND_COLORS_GREEN);
    }

    /**
     * 蓝色文字输出
     */
    public static function info(...$args) {
        $text = implode(' ', $args);
        echo self::apply($text . "\n", self::FOREGROUND_COLORS_BLUE);
    }

    /**
     * 黄色文字输出
     */
    public static function warning(...$args) {
        $text = implode(' ', $args);
        echo self::apply($text . "\n", self::FOREGROUND_COLORS_YELLOW);
    }

    /**
     * 红色文字输出
     */
    public static function error(...$args) {
        $text = implode(' ', $args);
        echo self::apply($text . "\n", self::FOREGROUND_COLORS_RED);
    }

    public static function apply($text, $foreground = null, $background = null, $options = null) {
        $setCodes = [];
        $unsetCodes = [];
        if (null !== $foreground) {
            $setCodes[] = $foreground['set'];
            $unsetCodes[] = $foreground['unset'];
        }
        if (null !== $background) {
            $setCodes[] = $background['set'];
            $unsetCodes[] = $background['unset'];
        }
        if (null != $options) {
            foreach ($options as $option) {
                $setCodes[] = $option['set'];
                $unsetCodes[] = $option['unset'];
            }
        }
        return sprintf("\033[%sm%s\033[%sm", implode(';', $setCodes), $text, implode(';', $unsetCodes));
    }

}