<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\MenuFormRequest;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function create(){

        return view('admin.menu.add',[
            'title' =>'Thêm mới danh mục'
            ]);
    }

    public function store(MenuFormRequest $request){
        return view('admin.menu.add',[
            'title' =>'Thêm mới danh mục'
        ]);
    }
}
