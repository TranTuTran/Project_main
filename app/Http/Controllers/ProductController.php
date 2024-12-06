<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{


    public function themsanpham () {
        return view('template.create');
    }
    // Request $request => $request = new Request; (tạo ra một đối tượng để truy xuất thuộc tính hoặc thực hiện hàm trong class)
    public function themdulieusanpham (Request $request) {
        $data = $request->except("_token");
        $image = $request->file('image'); 
        $storedPath = $image->move('hinhanh', $image->getClientOriginalName());
        $data['image'] = $image->getClientOriginalName();
        Product::create($data);
    }
}
