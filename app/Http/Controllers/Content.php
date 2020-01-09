<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;


class Content extends Controller
{
    
        static function get() {
        return View('content')->with('category',Category::All());
        }
        
        static function mainPage () {
            return View('content')->with('category',Category::All());
        }
        
        static function infoPayment () {
            return View('infoPayment');
        }
        
        static function about () {
            return View('about');
        }
}
