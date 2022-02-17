<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;

class SliderController extends Controller
{
    protected $slider;
    public function __construct(SliderService $slider)
    {
        $this->slider = $slider;
    }

    public function create(){
        return view('admin.slider.add', [
           'title' => 'Thêm mới slider'
        ]);
    }

    public function store(Request $request){
        /*valudate rules ngay trong controller*/
        $messages = [
            'name.required' => 'Yêu cầu nhập tên',
            'thumb.required' => 'Yêu cầu nhập thumb',
            'url.required' => 'Yêu cầu nhập url',
        ];
        $this->validate($request,[
           'name'=> 'required',
           'thumb'=> 'required',
           'url'=> 'required',
        ],$messages);
        $result = $this->slider->insert($request);
        return ($result['id']) ? redirect("/admin/sliders/edit/".$result['id']) : redirect()->back();
    }

    public function index(){
        return view('admin.slider.list', [
            'title' => 'Danh sách slider',
            'sliders' => $this->slider->getAllSlider()
        ]);
    }

    public function show(Slider $slider){
        return view('admin.slider.edit', [
            'title' => 'Chỉnh sửa slider',
            'slider' => $slider
        ]);
    }

    public function update(Request $request,Slider $slider){
        /*validate rules ngay trong controller*/
        $messages = [
            'name.required' => 'Yêu cầu nhập tên',
            'thumb.required' => 'Yêu cầu nhập thumb',
            'url.required' => 'Yêu cầu nhập url',
        ];
        $this->validate($request,[
            'name'=> 'required',
            'thumb'=> 'required',
            'url'=> 'required',
        ],$messages);
        /*valiate rules ngay trong controller*/

        $result = $this->slider->updateSlider($request,$slider);
        if($result)
        {
            return redirect('/admin/sliders/list');
        }else{
            return redirect()->back();
        }
    }

    public function destroy(Request $request){
        $result = $this->slider->destroy($request);
        if($result)
        {
            return response()->json([
               'error'=> true,
               'message'=> 'Xóa thành công Slider',
            ]);
        }
        return response()->json(['error'=>false]);
    }
}
