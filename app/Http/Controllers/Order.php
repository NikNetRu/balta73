<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Goods;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Order extends Controller
{   
    // отправить данные в шаблон
    function createOrderPage(request $request) {
    
        
        $sender = [];
        /*
        $keys = $request->keys();
        unset($keys[0]);
        print_r($request->all());
         * 
         */
        $summa = 0;
        
        $sessionCart = $request->session()->get('cart');
        foreach ($sessionCart as $key) {
            $id = $key['id'][0];
            $num = $key['num'][0];
            $exGood = Goods::all()->where('id', $id)->first();
            $sender[] = ['id' => $id, 
                'num' => $num, 
                'name' => $exGood['name'],
                'about' => $exGood['about'],
                'cost' => $exGood['cost'],
                'picture' => $exGood['picture'],
                'summary' => $exGood['cost']*$num];
            $summa += $exGood['cost']*$num;
             
        }
        
   $request->session()->put('summaryCost', $summa);
   return view("order")->with('orders', $sender)->with('summaryCost',$summa);
       
             
        
    }
    
    function addToCart (request $request) {
        $id = $request->input('id');
        $num = $request->input('num'); 
        $product = Goods::all()->where('id', $id)->first();
        
       if ($request->session()->exists('cart.'.$id)) {
                $oldNum = $request->session()->get('cart');
                $newNum = $oldNum[$id]['num'][0] + $num;
                $request->session()->forget('cart.'.$id);
                $request->session()->push('cart.'.$id.'.num', $newNum);
                $request->session()->push('cart.'.$id.'.name', $product->name);
                $request->session()->push('cart.'.$id.'.cost', $product->cost);
                $request->session()->push('cart.'.$id.'.id', $product->id);
        }
        else {                
                $request->session()->forget('cart.'.$id);
                $request->session()->push('cart.'.$id.'.name', $product->name);
                $request->session()->push('cart.'.$id.'.cost', $product->cost);
                $request->session()->push('cart.'.$id.'.id', $product->id);
                $request->session()->push('cart.'.$id.'.num', $num);

        }

        
    }
    
    //добавляем данные в таблицу Orders, чистим из сессии данные
    function addToOrder (request $request) {
        
        $senderString = '';
        foreach ($request->session()->get('cart') as $container) {
            
            $id = $container['id'][0];
            $num = $container['num'][0];
            (string) $senderString .= (string) "$id.$num,";
        }
        $senderString = substr($senderString,0,-1);
        DB::table('orders')->insert(['id_num' => $senderString, 'user' => Auth::user()->id, 'status' => 'notAcepted']);
        Session::forget('cart');
        return view('BuyThis');
    }
         
}


