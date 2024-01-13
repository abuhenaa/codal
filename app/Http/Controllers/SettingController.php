<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller{
    public function settingIndex()
    {
        return view('settings.index');
    }

    public function saveSetting(Request $request)
    {
        $request->validate([
            'enable' => 'required|bollean',
            'disable' => 'required|bollean',
        ]);
    }

}