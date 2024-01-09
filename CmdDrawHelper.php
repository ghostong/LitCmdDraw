<?php

if (!function_exists('drawCmdSuccess')) {
    function drawCmdSuccess(...$args) {
        call_user_func_array(['\Lit\CmdDraw\StyleOutput', 'success'], $args);
    }
}

if (!function_exists('drawCmdInfo')) {
    function drawCmdInfo(...$args) {
        call_user_func_array(['\Lit\CmdDraw\StyleOutput', 'info'], $args);
    }
}
if (!function_exists('drawCmdWarning')) {
    function drawCmdWarning(...$args) {
        call_user_func_array(['\Lit\CmdDraw\StyleOutput', 'warning'], $args);
    }
}

if (!function_exists('drawCmdError')) {
    function drawCmdError(...$args) {
        call_user_func_array(['\Lit\CmdDraw\StyleOutput', 'error'], $args);
    }
}