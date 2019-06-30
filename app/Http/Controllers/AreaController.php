<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Area;

class AreaController extends Controller
{
    public function saveArea(Request $request) {

        $area = Area::find($request->id);
        $area->text=$request->text;
        $area->save();
        return response()->json(['success'=>1]);
    }

    public function getAreaText(Request $request) {
        $json = [];
        $area = Area::find($request->id);

        if (!$area) {
            $json = ['success'=>0];
        } else {
            $json = ['success'=>1, 'text'=>$area->text,'name'=>$area->name];
        }
        return response()->json($json);
    }
}
