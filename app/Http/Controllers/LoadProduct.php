<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoadProduct extends Controller
{
    public function loadproduct(request $request) {
        $name = $_POST['inputName'];
        $property = $_POST['textArea'];
        $cost = $_POST['inputCost'];
        $category = $_POST['category'];
        $path = $request->file('inputFile')->store('uploads', 'public');
        DB::insert("insert into goods (name,category, cost, about, picture) values ('$name','$category', '$cost', '$property', '$path')");
        
        return view('template');
    }
    
}
