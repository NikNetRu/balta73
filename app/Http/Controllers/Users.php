<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Users extends Controller
{   
    
    public function generateUserPage ($userID) {
        
        $user = User::all()->where('id', $userID)->first();
        $orders = DB::table('orders')->where('user',$userID)->get();
        $senderOrder = [];
        foreach($orders as $order){
        $ordersArray = explode(',', $order->id_num);
        $orderStatus = $order->status;
        foreach ($ordersArray as $orderExample){
            $orderArray = explode('.',$orderExample);
            $idOrder = $orderArray[0];
            $numOrder = $orderArray[1];
            $good = DB::table('goods')->where('id', $idOrder)->first();
            $senderOrder[$order->id][] = [
                'name' => $good->name,
                'num' => $numOrder,
                'cost' => $good->cost,
                'status' => $orderStatus
            ];}
        }
        return view('user')->with('user', $user)->with('orders', $senderOrder);
    }
    
    public function editUserData (request $request) {
        $id = Auth::user()->id;
        $user = User::all()->where('id', $id);
        $realName = $request->input('realName');
        $realSurname = $request->input('realSurame');
        $adress = $request->input('adress');
        $phone = $request->input('phone');
        DB::table('users')->where('id', $id)->update(['realName' => $realName,'adress' => $adress, 'realSurname' => $realSurname, 'phone' => $phone]);
        return Redirect('/user/'.$id);
    }
}
