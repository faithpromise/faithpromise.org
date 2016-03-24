<?php

global $page_inline_css;

if (!isset($page_inline_css)) {
    $page_inline_css = '';
}

/* @var $directive array */

if ($directive['execution_mode'] == 'start') {
    ob_start();
}

if ($directive['execution_mode'] == 'end') {

    $content = ob_get_clean();

    $content = str_replace(["\n", "\r"], '', $content);
    $content = preg_replace('/\s+/', ' ', $content);
    $content = trim($content);

    $page_inline_css = $page_inline_css . $content;

}