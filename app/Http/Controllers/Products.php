<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Goods;

class Products extends Controller
{   
   
    public function createPage ($categoryName) {
        
        return view('goods')->with('goodsContainer',Goods::all()->where('category',$categoryName));
    }
}
