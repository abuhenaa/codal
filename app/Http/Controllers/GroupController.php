<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Osiset\ShopifyApp\Macros\TokenRedirect;

class GroupController extends Controller
{
    function groupIndex(){
        $groups = \App\Models\Group::all();
        return view('groups', compact('groups'));
    }

    function saveGroup(Request $request){
        //dd($request);
        $shop = $request->user();
        $group = new \App\Models\Group();
        $group->title = $request->title;
        $group->description = $request->description;
        $group->shop_id = $shop->id;
        $group->save();

        return redirect(URL::tokenRoute('groups.index'));
    }
}
