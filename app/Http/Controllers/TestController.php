<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function ebanumba()
    {
    	//$temp = User::find(1)->profession()->first();


    	//$temp = User::find(1)->friendStatus(7)->first()->pivot->status;

        return view('testview');
    }
}
