<?php
namespace App\Helpers;

use App\Model\Area;
use Request;
use Illuminate\Support\Facades\Auth;

class AreaHelper {

    /**
     * Get Content of editable area
     *
     * @param [string] $area_code
     * @return string
     */
    public static function getArea($area_code) {
        $result = '';
        $area = Area::whereCode($area_code)->first();

        if (!$area) {
            return 'Нет области с таким кодом: '.$area_code;
        }

        if (self::isEditMode()) {
            $result = '<span class="editable-area" id="ediare_'.$area->id.'">
            <span class="editable-area-panel"><span class="editable-area-panel-button" 
            data-areaid="'.$area->id.'" data-areacode="'.$area->code.'" data-toggle="modal" 
            data-target="#editable_area_modal" data-backdrop="static">Изменить</span></span>';
            $result .= $area->text;
            $result .= '</span>';
        } else {
            $result = $area->text;
        }
        return $result;
    }
    public static function getTitleArea($area_code) {
        $area = Area::whereCode($area_code)->first();
        if($area)
        return $area->name;
        else
        return null;
    }
    /**
     * Check Edit mode
     *
     * @return boolean
     */
    public static function isEditMode() {
        if(Auth::check())
        return Request::input('edit_mode') && Auth::user()->isAdmin();
        else
        return 0;
    }
}