<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class FaqController extends Controller
{
    function faqIndex($group_id){
        $group = Group::findOrFail($group_id);
        $faqs = \App\Models\Faq::where('group_id', $group_id)->get();
        return view('faqs', compact('faqs', 'group_id', 'group'));
    }

    function saveFaq(Request $request){
        //dd($request);
        $shop = $request->user();
        $faq = new \App\Models\Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->shop_id = $shop->id;
        $faq->group_id = $request->group_id;

        $faq->save();

        return redirect(URL::tokenRoute('faqs.index'));
    }
}
