<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\MenuFormRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index() {
        return view('admin.menu.list',[
            'title' => 'Danh sách danh mục',
            'menus' => $this->menuService->getAll(),
        ]);
    }

    public function create(){

        return view('admin.menu.add',[
            'title' =>'Thêm mới danh mục',
            'menus' => $this->menuService->getParent(),
            ]);
    }

    public function store(MenuFormRequest $request){
        $result = $this->menuService->create($request);
        return redirect()->back();
//        return view('admin.menu.add',[
//            'title' =>'Thêm mới danh mục'
//        ]);
    }

    public function destroy(Request $request){
        $result = $this->menuService->destroy($request);
        if($result){
            return response()->json([
                'error'=> true,
                'message'=> 'Xóa thành công danh mục',
            ]);
        }
        return response()->json([
            'error'=> false,
            'message'=> 'Xóa thất bại',
        ]);
    }

    public function show(Menu $menu){ // viet theo model + ten bien truyen vao giong voi params de ben ngoai se tu check id exist hay khong
        return view('admin.menu.edit',[
            'title' =>'Chỉnh sửa danh mục: '.$menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getParent(),
        ]);
    }

    public function update(Menu $menu,MenuFormRequest $request){
        $this->menuService->update($request,$menu);
        return redirect('/admin/menus/list');
    }
}
