<?php
namespace App\Listeners;

use Illuminate\Http\Request;
use App\Models\User;
use Osiset\ShopifyApp\Messaging\Events\AppInstalledEvent;

class AppInstalledEventListener
{
    /**
     * Handle the event.
     *
     * @param  AppInstalledEvent  $event
     * @return void
     */
    public function handle(AppInstalledEvent $event){
        //dd($event->shop());
        
        $request = new \Illuminate\Http\Request();
        $shop = $request->user();
        $resp = $shop->api()->rest('GET', '/admin/shop.json');
        $shopData = $resp['body']->shop;
        $shopify_id = $shopData->id;
        $user = new \App\Models\User();
        $user->shopify_id = $shopify_id;

        $shop->save();

    }
}