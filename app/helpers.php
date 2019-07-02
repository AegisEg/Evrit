<?php
use App\Helpers\AreaHelper;

if (!function_exists('get_area')) {
    /**
     * Echo content of editable area
     *
     * @param [string] $code
     * @return void
     */
    function get_area($code) {
        echo AreaHelper::getArea($code);
    }
}

if (!function_exists('is_edit_mode')) {
    function is_edit_mode() {
        return AreaHelper::isEditMode();
    }
}