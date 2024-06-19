<?php


if (!function_exists('form_method')) {
    function form_method(string $method): string
    {
        $method = strtolower($method);
        return '<input type="hidden" name="_method" value="' . $method . '">';
    }
}
