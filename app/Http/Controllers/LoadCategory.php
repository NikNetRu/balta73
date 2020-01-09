<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;

class LoadCategory extends Controller
{
        public function loadCategory(request $request) {
            
        $name = $_POST['inputName'];
        $path = $request->file('inputFile')->store('uploads', 'public');
        DB::insert("insert into category (name, picture) values ('$name','$path')");
        
        return view('template');
}



    
}
