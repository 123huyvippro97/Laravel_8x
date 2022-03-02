<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use http\Env\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService
{
    public function getAll(){
        return Menu::orderbyDesc('id')->paginate(20);
    }

    public function getParent(){
        /*tim hieu ve when trong php*/
//        return Menu::
//        when($parent_id == 1,function ($query) use ($parent_id){ //tuong ung voi if
//            $query->where('parent_id',$parent_id);
//        })->get();
        return Menu::where('parent_id',0)->get();
    }

    public function create($request){

        try {
            if (!empty($request)) {
                Menu::create([
                    'name' => (string) $request->input('name'),
                    'parent_id' => (int) $request->input('parent_id'),
                    'description' => (string) $request->input('description'),
                    'content' => (string) $request->input('content'),
                    'active' => (string) $request->input('active'),
                    'slug' => Str::slug($request->input('name'), '-')
                ]);
            }
            Session::flash('success','Tạo danh mục thành công');
        }catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request){
        $id = (int)$request->input('id');
        $menu = Menu::where('id',$id)->first();
        if($menu){
            /*xóa hết id cha và tìm tiếp những id con để xóa nốt*/
            return Menu::where('id',$id)->orWhere('parent_id',$id)->delete();
        }
        return false;

    }

    public function update($request,$menu){
//        $menu->fill($request->input());
//        $menu->save();
        if($request->input('parent_id') != $menu->id){
            $menu->parent_id = (int)$request->input('parent_id');
        }
        $menu->name = (string)$request->input('name');
        $menu->description = (string)$request->input('description');
        $menu->content = (string)$request->input('content');
        $menu->active = (string)$request->input('active');
        $menu->save();
        Session::flash('success','Cập nhập thành công danh mục');
        return true;
    }

    public function showList(){
        return Menu::select('name','id')->orderByDesc('id')->get();
    }
}
